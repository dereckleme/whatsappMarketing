<?php

namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioBlacklist
 *
 * @ORM\Table(name="usuario_blacklist", indexes={@ORM\Index(name="fk_produto_blackList_produto_listaCampanha_idx", columns={"listaCampanha"})})
 * @ORM\Entity
 */
class UsuarioBlacklist
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idblackList", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idblacklist;

    /**
     * @var \UsuarioListacampanha
     *
     * @ORM\ManyToOne(targetEntity="UsuarioListacampanha")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listaCampanha", referencedColumnName="idlistaCampanha")
     * })
     */
    private $listacampanha;


}
