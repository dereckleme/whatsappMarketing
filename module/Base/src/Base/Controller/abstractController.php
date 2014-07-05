<?php
namespace Base\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

abstract class abstractController extends AbstractActionController{
	protected $controller;
	protected $service;
	protected $data;
	protected $entity;
	protected $referenceInsert;
	protected $find = array();
	
	public function listarAction()
	{
		$em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
		$dados = $em->getRepository($this->entity)->findBy($this->find);
		return new ViewModel(array("data" => $dados));
	}
	public function inserirAction()
	{
			if(!empty($this->service))
			{
				$em = $this->getServiceLocator()->get($this->service);
				$this->referenceInsert = $em->insert($this->data);
				return false;
			}
			else
			{
				return new ViewModel();
			}
	}
	public function editarAction()
	{
		$em = $this->getServiceLocator()->get($this->service);
		$em->update($this->data);
		return new ViewModel();
	}
	/**
	 * @param field_type $data
	 */
	public function setData($data) {
		$this->data = $data;
	}
}

?>