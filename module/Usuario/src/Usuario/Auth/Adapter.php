<?php

namespace Usuario\Auth;

use Zend\Authentication\Adapter\AdapterInterface,
    Zend\Authentication\Result;

use Doctrine\ORM\EntityManager;

class Adapter implements AdapterInterface
{
    protected $em;
    protected $username;
    protected $password;
    
    public function __construct(EntityManager $em) 
    {
        $this->em = $em;
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function authenticate() 
    {
        $repository = $this->em->getRepository("Usuario\Entity\UsuarioUsuarios");
        
        $user = $repository->checkUser($this->getUsername(),$this->getPassword());
        if($user)
            return new Result(Result::SUCCESS, array('usuario'=>$user),array('OK'));
        else
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array());
    }


}
