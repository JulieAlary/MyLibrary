<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $PurchasedDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="books", cascade={"persist"})
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Owner", inversedBy="books", cascade={"persist"})
     */
    private $Owner;

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getPurchasedDate(): ?\DateTimeInterface
    {
        return $this->PurchasedDate;
    }

    public function setPurchasedDate(?\DateTimeInterface $PurchasedDate): self
    {
        $this->PurchasedDate = $PurchasedDate;

        return $this;
    }

    public function getOwner(): ?Owner
    {
        return $this->Owner;
    }

    public function setOwner(?Owner $Owner): self
    {
        $this->Owner = $Owner;

        return $this;
    }
}
