<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PagamentoPlanos
 *
 * @ORM\Table(name="pagamento_planos")
 * @ORM\Entity
 */
class PagamentoPlanos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idplano", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idplano;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantidade", type="integer", nullable=true)
     */
    private $quantidade;


}
