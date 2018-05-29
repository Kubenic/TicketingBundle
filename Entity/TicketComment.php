<?php

namespace Maps_red\TicketingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Maps_red\TicketingBundle\Model\TicketCommentInterface;
use Maps_red\TicketingBundle\Model\UserInterface;

/**
 * @ORM\MappedSuperclass()
 */
class TicketComment implements TicketCommentInterface
{
    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Maps_red\TicketingBundle\Interface\UserInterface")
     */
    private $author;

   public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAuthor(): ?UserInterface
    {
        return $this->author;
    }

    public function setAuthor(?UserInterface $author): self
    {
        $this->author = $author;

        return $this;
    }
}