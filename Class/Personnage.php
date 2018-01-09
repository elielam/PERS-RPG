<?php

abstract class Personnage {
	
	private $_id;
	protected $_name;
	protected $_type;

	const ME = 1;
	const KILL = 2;
	const HIT = 3;

	public function __construct(array $donnees) {
		$this->hydrate($donnees);
	}

	public function id () {
		return $this->_id;
	}

	public function name () {
		return $this->_name;
	}

	public function type () {
		return $this->_type;
	}

	public function setId($id)
  	{
    	$id = (int) $id;

	    if ($id > 0)
    	{
      		$this->_id = $id;
    	}
  	}

	public function setName($name)
  	{
	    if (is_string($name))
    	{
      		$this->_name = $name;
    	}
  	}

	public function setType($type)
  	{
	    if (is_string($type))
    	{
      		$this->_type = $type;
    	}
  	}

  	public function nameIsValid() {

	    return !empty($this->_name);

    }

  	public function hydrate(array $donnees)
  	{
	    foreach ($donnees as $key => $value)
	    {
	      $method = 'set'.ucfirst($key);
	      
	      if (method_exists($this, $method))
	      {
	        $this->$method($value);
	      }
	    }
  	}

}

