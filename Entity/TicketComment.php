<?php

namespace Maps_red\TicketingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Maps_red\TicketingBundle\Model\TicketCommentInterface;
use Maps_red\TicketingBundle\Model\TicketInterface;
use Maps_red\TicketingBundle\Model\Traits\Timestampable;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\MappedSuperclass()
 */
class TicketComment implements TicketCommentInterface
{
    use Timestampable;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Symfony\Component\Security\Core\User\UserInterface")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="Maps_red\TicketingBundle\Model\TicketInterface", inversedBy="comments")
     *
     * @ORM\JoinColumn(name="ticket", referencedColumnName="id", nullable=false)
     */
    protected $ticket;

    public function getId() : ?int
    {
        return $this->id;
    }

   public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): TicketCommentInterface
    {
        $this->text = $text;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): TicketCommentInterface
    {
        $this->status = $status;

        return $this;
    }

    public function getAuthor(): ?UserInterface
    {
        return $this->author;
    }

    public function setAuthor(?UserInterface $author): TicketCommentInterface
    {
        $this->author = $author;

        return $this;
    }

    public function getTicket(): ?TicketInterface
    {
        return $this->ticket;
    }

    public function setTicket($ticket):? TicketCommentInterface
    {
        $this->ticket = $ticket;

        return $this;
    }
}
