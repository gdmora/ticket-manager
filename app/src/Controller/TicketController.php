<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Entity\User;
use App\Entity\Factura;
use App\Form\TicketType;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TicketController extends AbstractController
{
    //Sección cliente
    #[Route('/cliente/dashboard', name: 'app_cliente_dashboard')]
    public function dashboardCliente(PersistenceManagerRegistry $doctrine): Response
    {
        //tickets pendientes
        $user = $doctrine->getRepository(User::class)->find($this->getUser());
        $user_id = $user->getId();
        $tickets_pendientes =  $doctrine->getRepository(Ticket::class)->findBy(array('cliente' => $user_id,
                                                                                     'estado'  => 'I'));
        
        //tickets solucionados
        $tickets_solucionados = $doctrine->getRepository(Ticket::class)->findBy(array('cliente' => $user_id,
                                                                                      'estado'  => ['A', 'F']));

        //tickets cliente
        $tickets_cliente = $doctrine->getRepository(Ticket::class)->findBy(array('cliente' => $user_id,
                                                                                 'estado'  => 'F'));
        $tickets_ids[] = -1;
                                                                          
        foreach($tickets_cliente as $ti)
        {
            array_push($tickets_ids, $ti->getId());
        }

        array_shift($tickets_ids);
        
        //facturas
        $facturas = $doctrine->getRepository(Factura::class)->findBy(array('ticket' => $tickets_ids));

        return $this->render('dashboard/cliente/dashboard.html.twig', [
            'tickets_pendientes'   => $tickets_pendientes,
            'tickets_solucionados' => $tickets_solucionados,
            'facturas'             => $facturas
        ]);
    }

    #[Route('/cliente/crear/ticket', name: 'app_ticket_crear')]
    public function crearTicket(Request $request, PersistenceManagerRegistry $doctrine): Response
    {
        $ticket = new Ticket();

        $cliente = $doctrine->getRepository(User::class)->find($this->getUser());

        $ticket->setCliente($cliente);
        $ticket->setEstado('I');

        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {   
            $em = $doctrine->getManager();
            $em->persist($ticket);
            $em->flush();

            return $this->redirectToRoute('app_cliente_dashboard');
        }

        return $this->render('ticket/crear.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //Sección técnico
    #[Route('/tecnico/dashboard', name: 'app_tecnico_dashboard')]
    public function dashboardTecnico(PersistenceManagerRegistry $doctrine): Response
    {
        $tickets_pendientes = $doctrine->getRepository(Ticket::class)->findBy(array('estado' => 'I'));
        
        return $this->render('dashboard/tecnico/dashboard.html.twig', [
            'tickets_pendientes' => $tickets_pendientes,
        ]);
    }

    #[Route('/tecnico/atender/ticket/{id}', name: 'app_ticket_atender')]
    public function atenderTicket(Request $request, $id, PersistenceManagerRegistry $doctrine): Response
    {
        $ticket = $doctrine->getRepository(Ticket::class)->find($id);

        $tecnico = $doctrine->getRepository(User::class)->find($this->getUser());

        $ticket->setTecnico($tecnico);
        $ticket->setEstado('A');

        $form = $this->createForm(TicketType::class, $ticket, [
            'incluir_solucion' => true,
            'incluir_horas' => true,
            'incluir_cliente' => true,
            'es_tecnico' => true 
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {   
            $em = $doctrine->getManager();
            $em->persist($ticket);
            $em->flush();

            return $this->redirectToRoute('app_tecnico_dashboard');
        }

        return $this->render('ticket/atender.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
