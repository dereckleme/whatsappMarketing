<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PagamentoControlerecibo
 *
 * @ORM\Table(name="pagamento_controlerecibo", indexes={@ORM\Index(name="fk_Pagamento_ControleRecibo_Usuario_Usuarios1_idx", columns={"usuario"}), @ORM\Index(name="idcadastro", columns={"cadastro"}), @ORM\Index(name="fk_pagamento_controlerecibo_pagamento_planos1_idx", columns={"plano"})})
 * @ORM\Entity
 */
class PagamentoControlerecibo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idControleRecibo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcontrolerecibo;

    /**
     * @var string
     *
     * @ORM\Column(name="nPedido", type="string", length=255, nullable=true)
     */
    private $npedido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_venda", type="datetime", nullable=true)
     */
    private $dtVenda;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $valor;

    /**
     * @var integer
     *
     * @ORM\Column(name="saldo", type="integer", nullable=true)
     */
    private $saldo;

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
     * @var \UsuarioCadastro
     *
     * @ORM\ManyToOne(targetEntity="UsuarioCadastro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cadastro", referencedColumnName="idcadastro")
     * })
     */
    private $cadastro;

    /**
     * @var \PagamentoPlanos
     *
     * @ORM\ManyToOne(targetEntity="PagamentoPlanos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="plano", referencedColumnName="idplano")
     * })
     */
    private $plano;


}
