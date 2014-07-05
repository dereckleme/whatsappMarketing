<?php



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
     * @ORM\ManyToOne(targetEntity="ProdutoCampanha")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campanha", referencedColumnName="idcampanha")
     * })
     */
    private $campanha;


}
