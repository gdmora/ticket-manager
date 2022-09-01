<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Entity\Factura;
use App\Form\FacturaType;
use App\Entity\User;
use App\Entity\Tarifa;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FacturaController extends AbstractController
{
    //Sección facturador
    #[Route('/facturador/dashboard', name: 'app_facturador_dashboard')]
    public function dashboardFacturador(PersistenceManagerRegistry $doctrine): Response
    {
        $tickets_por_facturar = $doctrine->getRepository(Ticket::class)->findBy(array('estado' => 'A'));

        return $this->render('dashboard/facturador/dashboard.html.twig', [
            'tickets_por_facturar' => $tickets_por_facturar,
        ]);
    }

    #[Route('/facturador/generar/factura/{id}', name: 'app_factura_crear')]
    public function crearFactura(Request $request, $id, PersistenceManagerRegistry $doctrine): Response
    {
        $ticket = $doctrine->getRepository(Ticket::class)->find($id);

        $ticket->setEstado('F');

        $horas = $ticket->getHoras();

        $facturador = $doctrine->getRepository(User::class)->find($this->getUser());

        $date = new \DateTime();

        $tarifa = $doctrine->getRepository(Tarifa::class)->findBy(array('tipo_trabajo' => 'servicio tecnico'))[0]->getValorPorHora();

        $costo = $this->calcularCosto($tarifa, $horas);
        
        $factura = new Factura();

        $factura->setFacturador($facturador);
        $factura->setTicket($ticket);
        $factura->setFecha($date);
        $factura->setValorACancelar($costo);

        $form = $this->createForm(FacturaType::class, $factura);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $doctrine->getManager();
            $em->persist($factura);
            $em->flush();

            return $this->redirectToRoute('app_facturador_dashboard');
        }

        return $this->render('factura/generar.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    private static function calcularCosto($tarifa, $horas)
    {
        return $tarifa*$horas;
    }

    //Sección gerente
    #[Route('/gerente/dashboard', name: 'app_gerente_dashboard')]
    public function dashboardGerente(Request $request, PersistenceManagerRegistry $doctrine): Response
    {
        $facturas = $doctrine->getRepository(Factura::class)->findAll();

        if($request->isMethod('GET') && $request->get('from_date')!=null)
        {
           $from_date = $request->query->get('from_date');
           $to_date = $request->query->get('to_date');

           $facturas = $doctrine->getRepository(Factura::class)->findByDateRange($from_date, $to_date);

        }

        return $this->render('dashboard/gerente/dashboard.html.twig', [
            'facturas' => $facturas,
        ]);
    }
}
