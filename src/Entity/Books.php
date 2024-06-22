<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BooksRepository;

#[ORM\Entity(repositoryClass: BooksRepository::class)]
class Books
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column(length: 255)]
    private ?string $publisher = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_of_first_publish = null;

    #[ORM\Column(length: 13, nullable: true)]
    private ?string $ISBN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $serial = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $cover = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $backcover = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbr_of_pages = null;

    #[ORM\ManyToOne(inversedBy: 'books_id')]
    private ?Medium $medium = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): static
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getDateOfFirstPublish(): ?\DateTimeInterface
    {
        return $this->date_of_first_publish;
    }

    public function setDateOfFirstPublish(?\DateTimeInterface $date_of_first_publish): static
    {
        $this->date_of_first_publish = $date_of_first_publish;

        return $this;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(?string $ISBN): static
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getSerial(): ?string
    {
        return $this->serial;
    }

    public function setSerial(?string $serial): static
    {
        $this->serial = $serial;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): static
    {
        $this->cover = $cover;

        return $this;
    }

    public function getBackcover(): ?string
    {
        return $this->backcover;
    }

    public function setBackcover(?string $backcover): static
    {
        $this->backcover = $backcover;

        return $this;
    }

    public function getNbrOfPages(): ?int
    {
        return $this->nbr_of_pages;
    }

    public function setNbrOfPages(?int $nbr_of_pages): static
    {
        $this->nbr_of_pages = $nbr_of_pages;

        return $this;
    }

    public function getMedium(): ?Medium
    {
        return $this->medium;
    }

    public function setMedium(?Medium $medium): static
    {
        $this->medium = $medium;

        return $this;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('ISBN', new Assert\Isbn([
            'type' => Assert\Isbn::ISBN_10,
            'message' => 'Erreur, l\'ISBN-10 n\'est pas valide.'
        ]));

        $metadata->addPropertyConstraint('ISBN', new Assert\Isbn([
            'type' => Assert\Isbn::ISBN_13,
            'message' => 'Erreur, l\'ISBN-13 n\'est pas valide.'
        ]));
    }
}


