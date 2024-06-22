<?php

namespace App\Entity;

use App\Repository\MediumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediumRepository::class)]
class Medium
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Books>
     */
    #[ORM\OneToMany(targetEntity: Books::class, mappedBy: 'medium')]
    private Collection $books_id;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function __construct()
    {
        $this->books_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Books>
     */
    public function getBooksId(): Collection
    {
        return $this->books_id;
    }

    public function addBooksId(Books $booksId): static
    {
        if (!$this->books_id->contains($booksId)) {
            $this->books_id->add($booksId);
            $booksId->setMedium($this);
        }

        return $this;
    }

    public function removeBooksId(Books $booksId): static
    {
        if ($this->books_id->removeElement($booksId)) {
            // set the owning side to null (unless already changed)
            if ($booksId->getMedium() === $this) {
                $booksId->setMedium(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
    public function __toString()
    {
      return $this->name;
    }
  
}
