<?php

namespace Base\Service;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

abstract class AbstractService 
{

    /**
     *
     * @var EntityManager
     */
    protected $em;
    protected $entity; 
    /*
     * definições de abstração
     */
    protected $targetEntity;
    protected $campo;
    protected $actionReference;
    
    public function __construct(EntityManager $em) 
    {
        $this->em = $em;
    }
    
    public function insert(array $data)
    {        
        $entity = new $this->entity($data);
        $data['nivelUsuario'] = "2";
        if(!empty($this->targetEntity) && !is_array($this->targetEntity))
        {
            $reference = $this->em->getReference($this->targetEntity, $this->actionReference);
            $string = $this->campo;
            $entity->$string($reference);
        }
        else if(!empty($this->targetEntity) && is_array($this->targetEntity))
        {
            foreach($this->targetEntity AS $entityes)
            {                
                $reference = $this->em->getReference($entityes['setTargetEntity'], $entityes['setActionReference']);
                $string = $entityes['setCampo'];
                $entity->$string($reference);
            }
        }
        (new Hydrator\ClassMethods())->hydrate($data, $entity);
       
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    
    public function update(array $data)
    {
        $entity = $this->em->getReference($this->entity, $data['id']);
        if(!empty($this->targetEntity) && !is_array($this->targetEntity))
        {
        	$reference = $this->em->getReference($this->targetEntity, $this->actionReference);
        	$string = $this->campo;
        	$entity->$string($reference);
        }
        else if(!empty($this->targetEntity) && is_array($this->targetEntity))
        {
        	foreach($this->targetEntity AS $entityes)
        	{
        		$reference = $this->em->getReference($entityes['setTargetEntity'], $entityes['setActionReference']);
        		$string = $entityes['setCampo'];
        		$entity->$string($reference);
        	}
        }
        (new Hydrator\ClassMethods())->hydrate($data, $entity);
        
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    
    public function delete($id)
    {
        $entity = $this->em->getReference($this->entity, $id);
        if($entity)
        {
            $this->em->remove($entity);
            $this->em->flush();
            return $id;
        }
    }
	/**
	 * @param field_type $targetEntity
	 */
	public function setTargetEntity($targetEntity) {
		$this->targetEntity = $targetEntity;
	}

	/**
	 * @param field_type $campo
	 */
	public function setCampo($campo) {
		$this->campo = $campo;
	}
	/**
	 * @param field_type $actionReference
	 */
	public function setActionReference($actionReference) {
		$this->actionReference = $actionReference;
	}
}
