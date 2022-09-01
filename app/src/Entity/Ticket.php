<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?User $cliente = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $problema = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $solucion = null;

    #[ORM\Column(nullable: true)]
    private ?int $horas = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $estado = null;

    #[ORM\ManyToOne]
    private ?User $tecnico = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliente(): ?User
    {
        return $this->cliente;
    }

    public function setCliente(?User $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getProblema(): ?string
    {
        return $this->problema;
    }

    public function setProblema(string $problema): self
    {
        $this->problema = $problema;

        return $this;
    }

    public function getSolucion(): ?string
    {
        return $this->solucion;
    }

    public function setSolucion(?string $solucion): self
    {
        $this->solucion = $solucion;

        return $this;
    }

    public function getHoras(): ?int
    {
        return $this->horas;
    }

    public function setHoras(?int $horas): self
    {
        $this->horas = $horas;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getTecnico(): ?User
    {
        return $this->tecnico;
    }

    public function setTecnico(?User $tecnico): self
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }
}
