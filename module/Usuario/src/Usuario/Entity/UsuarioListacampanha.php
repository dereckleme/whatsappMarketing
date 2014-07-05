<?php
namespace Usuario\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioListacampanha
 *
 * @ORM\Table(name="usuario_listacampanha", indexes={@ORM\Index(name="fk_produto_listaCampanha_produto_listas1_idx", columns={"lista"})})
 * @ORM\Entity
 */
class UsuarioListacampanha
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idlistaCampanha", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlistacampanha;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=255, nullable=false)
     */
    private $telefone;

    /**
     * @var \UsuarioListas
     *
     * @ORM\ManyToOne(targetEntity="UsuarioListas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lista", referencedColumnName="idlistas")
     * })
     */
    private $lista;
    /**
     * @var integer
     *
     * @ORM\Column(name="valido", type="integer", nullable=true)
     */
    private $valido = '0';
	/**
	 * @return the $idlistacampanha
	 */
	public function getIdlistacampanha() {
		return $this->idlistacampanha;
	}

	/**
	 * @return the $telefone
	 */
	public function getTelefone() {
		return $this->telefone;
	}

	/**
	 * @return the $lista
	 */
	public function getLista() {
		return $this->lista;
	}

	/**
	 * @param number $idlistacampanha
	 */
	public function setIdlistacampanha($idlistacampanha) {
		$this->idlistacampanha = $idlistacampanha;
	}

	/**
	 * @param string $telefone
	 */
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}

	/**
	 * @param UsuarioListas $lista
	 */
	public function setLista($lista) {
		$this->lista = $lista;
	}
	/**
	 * @return the $valido
	 */
	public function getValido() {
		return $this->valido;
	}

	/**
	 * @param number $valido
	 */
	public function setValido($valido) {
		$this->valido = $valido;
	}



	
}
