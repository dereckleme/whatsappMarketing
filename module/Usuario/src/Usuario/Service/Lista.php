<?php
namespace Usuario\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class Lista extends AbstractService{
	public $idUsuario;
	public function __construct(EntityManager $em){
		parent::__construct($em);
		$this->entity = "Usuario\Entity\UsuarioListas";
	}
	public function insert(array $data)
	{
		$this->setTargetEntity("Usuario\Entity\UsuarioUsuarios");
		$this->setCampo("setUsuario");
		$this->setActionReference($this->idUsuario);
		return parent::insert($data);
	}
}

?>