<?php

namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioListas
 *
 * @ORM\Table(name="usuario_listas", indexes={@ORM\Index(name="fk_usuario_listas_usuario_usuarios1_idx", columns={"usuario"})})
 * @ORM\Entity(repositoryClass="Usuario\Entity\UsuarioListasRepository")
 * @ORM\Entity
 */
class UsuarioListas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idlistas", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlistas;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255, nullable=true)
     */
    private $titulo;

    /**
     * @var \UsuarioUsuarios
     *
     * @ORM\ManyToOne(targetEntity="UsuarioUsuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="idUsuario")
     * })
     */
    private $usuario;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="UsuarioListacampanha", mappedBy="lista")
     */
    private $listaTelefones;
    /**
     * @var integer
     *
     * @ORM\Column(name="validacao", type="integer", nullable=true)
     */
    private $validacao = '0';
	/**
	 * @return the $idlistas
	 */
	public function getIdlistas() {
		return $this->idlistas;
	}

	/**
	 * @return the $titulo
	 */
	public function getTitulo() {
		return $this->titulo;
	}

	/**
	 * @return the $usuario
	 */
	public function getUsuario() {
		return $this->usuario;
	}

	/**
	 * @param number $idlistas
	 */
	public function setIdlistas($idlistas) {
		$this->idlistas = $idlistas;
	}

	/**
	 * @param string $titulo
	 */
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}

	/**
	 * @param UsuarioUsuarios $usuario
	 */
	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}
	/**
	 * @return the $listaTelefones
	 */
	public function getListaTelefones() {
		return $this->listaTelefones;
	}

	/**
	 * @param \Doctrine\Common\Collections\Collection $listaTelefones
	 */
	public function setListaTelefones($listaTelefones) {
		$this->listaTelefones = $listaTelefones;
	}
	/**
	 * @return the $validacao
	 */
	public function getValidacao() {
		return $this->validacao;
	}

	/**
	 * @param number $validacao
	 */
	public function setValidacao($validacao) {
		$this->validacao = $validacao;
	}



	
	
}
