<?php

namespace Produto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoCampanha
 *
 * @ORM\Table(name="produto_campanha", indexes={@ORM\Index(name="fk_produto_campanha_produto_listas1_idx", columns={"lista"}), @ORM\Index(name="fk_produto_campanha_usuario_usuarios1_idx", columns={"usuario"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Produto\Entity\ProdutoCampanhaRepository")
 */
class ProdutoCampanha
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcampanha", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcampanha;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="imagem", type="string", length=255, nullable=true)
     */
    private $imagem;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

    /**
     * @var \UsuarioUsuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuario\Entity\UsuarioUsuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="idUsuario")
     * })
     */
    private $usuario;

    /**
     * @var \UsuarioListas
     *
     * @ORM\ManyToOne(targetEntity="Usuario\Entity\UsuarioListas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lista", referencedColumnName="idlistas")
     * })
     */
    private $lista;
    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '1';
	/**
	 * @return the $idcampanha
	 */
	public function getIdcampanha() {
		return $this->idcampanha;
	}

	/**
	 * @return the $titulo
	 */
	public function getTitulo() {
		return $this->titulo;
	}

	/**
	 * @return the $imagem
	 */
	public function getImagem() {
		return $this->imagem;
	}

	/**
	 * @return the $descricao
	 */
	public function getDescricao() {
		return $this->descricao;
	}

	/**
	 * @return the $usuario
	 */
	public function getUsuario() {
		return $this->usuario;
	}

	/**
	 * @return the $lista
	 */
	public function getLista() {
		return $this->lista;
	}

	/**
	 * @param number $idcampanha
	 */
	public function setIdcampanha($idcampanha) {
		$this->idcampanha = $idcampanha;
	}

	/**
	 * @param string $titulo
	 */
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}

	/**
	 * @param string $imagem
	 */
	public function setImagem($imagem) {
		$this->imagem = $imagem;
	}

	/**
	 * @param string $descricao
	 */
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	/**
	 * @param UsuarioUsuarios $usuario
	 */
	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	/**
	 * @param UsuarioListas $lista
	 */
	public function setLista($lista) {
		$this->lista = $lista;
	}
	/**
	 * @return the $status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @param number $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}


	

}
