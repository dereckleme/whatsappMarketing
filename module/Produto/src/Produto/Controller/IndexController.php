<?php

namespace Produto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function criarCampanhasAction()
    {
        return new ViewModel();
    }

    public function enviarMensagemAction()
    {
        return new ViewModel();
    }

    public function enviarCampanhasAction()
    {
        return new ViewModel();
    }


}

