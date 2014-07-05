<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoCampanha
 *
 * @ORM\Table(name="produto_campanha", indexes={@ORM\Index(name="fk_produto_campanha_produto_listas1_idx", columns={"lista"}), @ORM\Index(name="fk_produto_campanha_usuario_usuarios1_idx", columns={"usuario"})})
 * @ORM\Entity
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
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '1';

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
     * @var \UsuarioListas
     *
     * @ORM\ManyToOne(targetEntity="UsuarioListas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lista", referencedColumnName="idlistas")
     * })
     */
    private $lista;


}
