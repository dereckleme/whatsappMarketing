<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcategoria
 *
 * @ORM\Table(name="subcategoria")
 * @ORM\Entity
 */
class Subcategoria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idsubcategoria", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsubcategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var \Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="subcategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcategoria", referencedColumnName="idcategoria")
     * })
     */
    private $idcategoria;
    
	/**
	 * @return the $idsubcategoria
	 */
	public function getIdsubcategoria() {
		return $this->idsubcategoria;
	}

	/**
	 * @return the $nome
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @return the $idcategoria
	 */
	public function getIdcategoria() {
		return $this->idcategoria;
	}

	/**
	 * @param number $idsubcategoria
	 */
	public function setIdsubcategoria($idsubcategoria) {
		$this->idsubcategoria = $idsubcategoria;
	}

	/**
	 * @param string $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

	/**
	 * @param Categoria $idcategoria
	 */
	public function setIdcategoria($idcategoria) {
		$this->idcategoria = $idcategoria;
	}


    

}
