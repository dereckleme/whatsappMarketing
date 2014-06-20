<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	/*
    	$whatsapp = $this->getServiceLocator()->get("Whatsapp\Service\Whatsapp");
    	//$whatsapp->sendMessageImage("5511958439600", "http://autos.vocedeolhoemtudo.com.br/wp-content/gallery/carro-gt/carro-gt-13.jpg");
    	//$whatsapp->sendMessage("5511958439600", null);
    	
    	//var_dump($whatsapp->sendMessage("7511958439600", "zzzzzz"));
    	print "<hr/>";
    	print "<hr/>";
    	@$teste = $whatsapp->checkCredentials("5511958439600");
    	print $teste;
    	*/
        return new ViewModel();
    }
    
}
