<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_tickets;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tickets")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Spectacle", inversedBy="tickets")
     */
    private $spectacle;

    public function __construct()
    {
        $this->spectacle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbTickets(): ?int
    {
        return $this->nb_tickets;
    }

    public function setNbTickets(int $nb_tickets): self
    {
        $this->nb_tickets = $nb_tickets;

        return $this;
    }

    public function getTotalPrice(): ?int
    {
        return $this->total_price;
    }

    public function setTotalPrice(int $total_price): self
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Spectacle[]
     */
    public function getSpectacle(): Collection
    {
        return $this->spectacle;
    }

    public function addSpectacle(Spectacle $spectacle): self
    {
        if (!$this->spectacle->contains($spectacle)) {
            $this->spectacle[] = $spectacle;
        }

        return $this;
    }

    public function removeSpectacle(Spectacle $spectacle): self
    {
        if ($this->spectacle->contains($spectacle)) {
            $this->spectacle->removeElement($spectacle);
        }

        return $this;
    }
}
