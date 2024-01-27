<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use App\Repository\CollectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'artist', targetEntity: Title::class)]
    private $titles;

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

    public function getTitles(): Collection
    {
        return $this->titles;
    }

    public function addTitle(Title $title): self
    {
        if (!$this->titles->contains($title)) {
            $this->titles[] = $title;
            $title->setArtist($this->getName());
        }

        return $this;
    }


    public function removeTitle(Title $title): self
    {
        if ($this->titles->contains($title)) {
            $this->titles->removeElement($title);
            $title->setArtist($this->getName());
        }

        return $this;
    }
}
