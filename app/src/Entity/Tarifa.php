<?php

namespace App\Entity;

use App\Repository\TarifaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifaRepository::class)]
class Tarifa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tipo_trabajo = null;

    #[ORM\Column]
    private ?float $valor_por_hora = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoTrabajo(): ?string
    {
        return $this->tipo_trabajo;
    }

    public function setTipoTrabajo(string $tipo_trabajo): self
    {
        $this->tipo_trabajo = $tipo_trabajo;

        return $this;
    }

    public function getValorPorHora(): ?float
    {
        return $this->valor_por_hora;
    }

    public function setValorPorHora(float $valor_por_hora): self
    {
        $this->valor_por_hora = $valor_por_hora;

        return $this;
    }
}
