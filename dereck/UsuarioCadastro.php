<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioCadastro
 *
 * @ORM\Table(name="usuario_cadastro", indexes={@ORM\Index(name="fk_usuario_cadastro_Usuario_Usuarios1_idx", columns={"usuario"})})
 * @ORM\Entity
 */
class UsuarioCadastro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcadastro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="rua", type="string", length=255, nullable=true)
     */
    private $rua;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=255, nullable=true)
     */
    private $bairro;

    /**
     * @var string
     *
     * @ORM\Column(name="CEP", type="string", length=255, nullable=true)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=45, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=45, nullable=true)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=45, nullable=true)
     */
    private $cnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_res", type="string", length=255, nullable=true)
     */
    private $telefoneRes;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_cel", type="string", length=255, nullable=true)
     */
    private $telefoneCel;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone_com", type="string", length=255, nullable=true)
     */
    private $telefoneCom;

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
