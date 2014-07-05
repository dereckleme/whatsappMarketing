<?php
namespace Usuario\Controller;
use Base\Controller\abstractController;
use Zend\View\Model\ViewModel;
class ListaController extends abstractController
{ 
	public function listarAction()
	{
		$this->entity = "Usuario\Entity\UsuarioListas";
		return parent::listarAction();
	}
	public function inserirAction()
	{
		$request = $this->getRequest();
		if($request->isPost())
		{
			$lista = $request->getPost("data");
			$lista = explode("\n",$lista);
			$this->service = "Usuario\Service\Lista";
			parent::setData(array("titulo" => $request->getPost("titulo")));
			parent::inserirAction();
			$this->service = "Usuario\Service\ListaCampanha";
			$idLista = $this->referenceInsert->getIdlistas();
			foreach($lista AS $value)
			{
				parent::setData(array("idLista" => $idLista, "telefone" => $value));
				parent::inserirAction();
			}
		}
		else
		{
		return parent::inserirAction();
		}
	}
	public function validarAction()
	{
		$request = $this->getRequest();
		if($request->isPost() && !empty($request->getPost("idLista")))
		{
			$this->service = "Usuario\Service\Lista";
			parent::setData(array("id" => $request->getPost("idLista"), "validacao" => 1));
			parent::editarAction();
		}
		$view = new ViewModel();
		$view->setTerminal(true);
		return $view;
	}
}

