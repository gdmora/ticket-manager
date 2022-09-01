<?php

namespace App\Entity;

use App\Repository\FacturaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FacturaRepository::class)]
class Factura
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Ticket $ticket = null;

    #[ORM\Column(nullable: true)]
    private ?float $valor_a_cancelar = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\ManyToOne]
    private ?User $facturador = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTicket(): ?Ticket
    {
        return $this->ticket;
    }

    public function setTicket(?Ticket $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }

    public function getValorACancelar(): ?float
    {
        return $this->valor_a_cancelar;
    }

    public function setValorACancelar(?float $valor_a_cancelar): self
    {
        $this->valor_a_cancelar = $valor_a_cancelar;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getFacturador(): ?User
    {
        return $this->facturador;
    }

    public function setFacturador(?User $facturador): self
    {
        $this->facturador = $facturador;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }
}
