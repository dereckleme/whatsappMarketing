<?php
namespace Produto\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class Campanha extends AbstractService{
	public $idUsuario;
	public function __construct(EntityManager $em){
		parent::__construct($em);
		$this->entity = "Produto\Entity\ProdutoCampanha";
	}
	public function insert(array $data)
	{
		$this->setTargetEntity(array(
				array("setTargetEntity" => "Usuario\Entity\UsuarioListas",
						"setCampo" => "setLista",
						"setActionReference" => $data['idLista']),
				array("setTargetEntity" => "Usuario\Entity\UsuarioUsuarios",
						"setCampo" => "setUsuario",
						"setActionReference" => $this->idUsuario),
		));
		return parent::insert($data);
	}
}

?>