<?php

namespace App\Entity;

use App\Repository\CriticRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CriticRepository::class)]
class Critic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_of_creation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date_of_last_update = null;

        public function __construct()
    {
        $this->date_of_creation = new \DateTime();
    }

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getDateOfCreation(): ?\DateTimeInterface
    {
        return $this->date_of_creation;
    }

    public function setDateOfCreation(\DateTimeInterface $date_of_creation): static
    {
        $this->date_of_creation = $date_of_creation;

        return $this;
    }

    public function getDateOfLastUpdate(): ?string
    {
        return $this->date_of_last_update;
    }

    public function setDateOfLastUpdate(?string $date_of_last_update): static
    {
        $this->date_of_last_update = $date_of_last_update;

        return $this;
    }
}
