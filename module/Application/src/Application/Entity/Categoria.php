<?php



namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Categoria
 *
 * @ORM\Table(name="categoria")
 * @ORM\Entity
 */
class Categoria
{
	public function __construct()
	{
		$this->subcategorias = new ArrayCollection();
	}
	
    /**
     * @var integer
     *
     * @ORM\Column(name="idcategoria", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;
    
    /**
     * @ORM\OneToMany(targetEntity="Subcategoria", mappedBy="idcategoria")
     * @var Collection
     */
    private $subcategorias;
    
	/**
	 * @return the $idcategoria
	 */
	public function getIdcategoria() {
		return $this->idcategoria;
	}

	/**
	 * @return the $nome
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @param number $idcategoria
	 */
	public function setIdcategoria($idcategoria) {
		$this->idcategoria = $idcategoria;
	}

	/**
	 * @param string $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

	/** @return Collection */
	public function getSubcategorias() {
		return $this->subcategorias;
	}

}
