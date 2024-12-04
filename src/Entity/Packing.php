<?php

namespace App\Entity;

use App\Repository\PackingRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;
use Sylius\Resource\Metadata as Metadata;
use Sylius\Resource\Model\ResourceInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Unique;

#[ORM\Entity(repositoryClass: PackingRepository::class)]
#[Table(name: 'app_packing')]
#[Metadata\AsResource(
    section: 'admin',
    routePrefix: 'admin',
    templatesDir: '@SyliusAdmin/shared/crud',
    operations: [
        new Metadata\Index(),
        new Metadata\Create(),
        new Metadata\Show(),
        new Metadata\Update(),
        new Metadata\Delete(),
        new Metadata\BulkDelete(),
    ]
)]
class Packing implements ResourceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Length(min: 5)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column]
    private ?int $price = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }
}
