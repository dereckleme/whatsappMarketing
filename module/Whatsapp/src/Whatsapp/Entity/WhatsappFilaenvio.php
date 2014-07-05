<?php

namespace Whatsapp\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WhatsappFilaenvio
 *
 * @ORM\Table(name="whatsapp_filaenvio", indexes={@ORM\Index(name="fk_whatsapp_filaEnvio_produto_campanha1_idx", columns={"campanha"})})
 * @ORM\Entity
 */
class WhatsappFilaenvio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idfilaEnvio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfilaenvio;

    /**
     * @var integer
     *
     * @ORM\Column(name="prioridade", type="integer", nullable=false)
     */
    private $prioridade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataEnvio", type="datetime", nullable=true)
     */
    private $dataenvio;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=255, nullable=true)
     */
    private $telefone;

    /**
     * @var \ProdutoCampanha
     *
     * @ORM\ManyToOne(targetEntity="Produto\Entity\ProdutoCampanha")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campanha", referencedColumnName="idcampanha")
     * })
     */
    private $campanha;
	/**
	 * @return the $idfilaenvio
	 */
	public function getIdfilaenvio() {
		return $this->idfilaenvio;
	}

	/**
	 * @return the $prioridade
	 */
	public function getPrioridade() {
		return $this->prioridade;
	}

	/**
	 * @return the $dataenvio
	 */
	public function getDataenvio() {
		return $this->dataenvio;
	}

	/**
	 * @return the $telefone
	 */
	public function getTelefone() {
		return $this->telefone;
	}

	/**
	 * @return the $campanha
	 */
	public function getCampanha() {
		return $this->campanha;
	}

	/**
	 * @param number $idfilaenvio
	 */
	public function setIdfilaenvio($idfilaenvio) {
		$this->idfilaenvio = $idfilaenvio;
	}

	/**
	 * @param number $prioridade
	 */
	public function setPrioridade($prioridade) {
		$this->prioridade = $prioridade;
	}

	/**
	 * @param DateTime $dataenvio
	 */
	public function setDataenvio($dataenvio) {
		$this->dataenvio = $dataenvio;
	}

	/**
	 * @param string $telefone
	 */
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}

	/**
	 * @param ProdutoCampanha $campanha
	 */
	public function setCampanha($campanha) {
		$this->campanha = $campanha;
	}


	
}
