<?php



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
     * @var integer
     *
     * @ORM\Column(name="valido", type="integer", nullable=true)
     */
    private $valido = '0';

    /**
     * @var \UsuarioListas
     *
     * @ORM\ManyToOne(targetEntity="UsuarioListas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lista", referencedColumnName="idlistas")
     * })
     */
    private $lista;


}
