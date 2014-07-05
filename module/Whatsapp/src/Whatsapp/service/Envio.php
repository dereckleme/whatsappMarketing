<?php
namespace Whatsapp\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class Envio extends AbstractService{
	public $idUsuario;
	public function __construct(EntityManager $em){
		parent::__construct($em);
		$this->entity = "Whatsapp\Entity\WhatsappFilaenvio";
	}
	public function insert(array $data)
	{
		$this->setTargetEntity(array(
				array("setTargetEntity" => "Produto\Entity\ProdutoCampanha",
						"setCampo" => "setCampanha",
						"setActionReference" => $data['idCampanha']),
		));
		return parent::insert($data);
	}
}

?>