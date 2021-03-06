<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountyRepository")
 */
class County
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\State", inversedBy="counties")
     */
    private $state;

    /**
     * @ORM\Column(type="float")
     */
    private $taxRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $amountTaxes;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getState(): ?state
    {
        return $this->state;
    }

    public function setState(?state $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getTaxRate(): ?float
    {
        return $this->taxRate;
    }

    public function setTaxRate(float $taxRate): self
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    public function getAmountTaxes(): ?int
    {
        return $this->amountTaxes;
    }

    public function setAmountTaxes(int $amountTaxes): self
    {
        $this->amountTaxes = $amountTaxes;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
