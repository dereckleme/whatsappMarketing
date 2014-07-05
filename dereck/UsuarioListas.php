<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioListas
 *
 * @ORM\Table(name="usuario_listas", indexes={@ORM\Index(name="fk_usuario_listas_usuario_usuarios1_idx", columns={"usuario"})})
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
     * @var integer
     *
     * @ORM\Column(name="validacao", type="integer", nullable=true)
     */
    private $validacao = '0';

    /**
     * @var \UsuarioUsuarios
     *
     * @ORM\ManyToOne(targetEntity="UsuarioUsuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="idUsuario")
     * })
     */
    private $usuario;


}
