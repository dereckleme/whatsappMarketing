<?php

namespace Usuario\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioUsuariosRepository extends EntityRepository
{
	public function checkUser($login,$senha)
	{
		
		$login = $this->findOneBylogin($login);
		if($login)
		{
			$entityPass = $login->getSenha();
			if($entityPass == $senha)
			{
				return $login;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
		 
	}
}