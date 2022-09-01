<?php

namespace App\Form;

use App\Entity\Ticket;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('problema', TextareaType::class, [
                'disabled' => $options['es_tecnico']
            ])
        ;

        if($options['incluir_cliente'])
        {
            $builder
                ->add('cliente', EntityType:: class, [
                    'class'    => User::class,
                    'disabled' => $options['es_tecnico']
                ])
            ;
        }
        if ($options['incluir_estado'])
        {   
            $builder
                ->add('estado', ChoiceType::class, [
                    'choices' => [
                        'Ingresado' => 'I',
                        'Atendido'  => 'A',
                        'Facturado' => 'F',
                        'Cobrado'   => 'C'
                    ],
                ])
            ;
        }
        if ($options['incluir_solucion'])
        {   
            $builder
                ->add('solucion')
            ;
        }
        if ($options['incluir_tecnico'])
        {   
            $builder
                ->add('tecnico', EntityType:: class, [
                    'class' => User::class,
                ])
            ;
        }
        if ($options['incluir_horas'])
        {   
            $builder
                ->add('horas')
            ;
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
            'incluir_solucion' => false,
            'incluir_horas' => false,
            'incluir_tecnico' => false,
            'incluir_estado' => false,
            'incluir_cliente' => false,
            'es_tecnico' => false  
        ]);
    }
}
