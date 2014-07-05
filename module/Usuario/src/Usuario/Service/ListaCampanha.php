<?php
namespace Usuario\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class ListaCampanha extends AbstractService{
	public function __construct(EntityManager $em){
		parent::__construct($em);
		$this->entity = "Usuario\Entity\UsuarioListacampanha";
	}
	public function insert(array $data)
	{
		$this->setTargetEntity("Usuario\Entity\UsuarioListas");
		$this->setCampo("setLista");
		$this->setActionReference($data['idLista']);
		parent::insert($data);
	}
}

?>