<?php
namespace Usuario\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioUsuarios
 *
 * @ORM\Table(name="usuario_usuarios")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Usuario\Entity\UsuarioUsuariosRepository")
 */
class UsuarioUsuarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUsuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=255, nullable=true)
     */
    private $senha;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel", type="integer", nullable=false)
     */
    private $nivel;
	/**
	 * @return the $idusuario
	 */
	public function getIdusuario() {
		return $this->idusuario;
	}

	/**
	 * @return the $login
	 */
	public function getLogin() {
		return $this->login;
	}

	/**
	 * @return the $senha
	 */
	public function getSenha() {
		return $this->senha;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return the $nivel
	 */
	public function getNivel() {
		return $this->nivel;
	}

	/**
	 * @param number $idusuario
	 */
	public function setIdusuario($idusuario) {
		$this->idusuario = $idusuario;
	}

	/**
	 * @param string $login
	 */
	public function setLogin($login) {
		$this->login = $login;
	}

	/**
	 * @param string $senha
	 */
	public function setSenha($senha) {
		$this->senha = $senha;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @param number $nivel
	 */
	public function setNivel($nivel) {
		$this->nivel = $nivel;
	}



}
