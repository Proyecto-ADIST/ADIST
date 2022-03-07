<?php

namespace App\Entity;

use App\Repository\PedidoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PedidoRepository::class)
 */
class Pedido
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="pedidos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    /**
     * @ORM\ManyToMany(targetEntity=Producto::class, inversedBy="pedidos")
     */
    private $idProducto;

    /**
     * @ORM\ManyToOne(targetEntity=Tienda::class, inversedBy="pedidos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idTienda;

    public function __construct()
    {
        $this->idProducto = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * @return Collection<int, Producto>
     */
    public function getIdProducto(): Collection
    {
        return $this->idProducto;
    }

    public function addIdProducto(Producto $idProducto): self
    {
        if (!$this->idProducto->contains($idProducto)) {
            $this->idProducto[] = $idProducto;
        }

        return $this;
    }

    public function removeIdProducto(Producto $idProducto): self
    {
        $this->idProducto->removeElement($idProducto);

        return $this;
    }

    public function getIdTienda(): ?Tienda
    {
        return $this->idTienda;
    }

    public function setIdTienda(?Tienda $idTienda): self
    {
        $this->idTienda = $idTienda;

        return $this;
    }
}
