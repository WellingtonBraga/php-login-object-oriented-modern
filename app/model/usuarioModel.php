<?php
Class usuarioModel{

    /**
     * @var $nome
     */
    private $nome;

    /**
     * @var $email
     */
    private $email;

    /**
     * @var $senha
     */
    private $senha;

    public function __set($name = null, $value = null){
        if(property_exists($this, $name)){
            $this->$name = $value;
            return;
        }
        throw new Exception("Property doesn't exists.", 1);

    }

    public function __get($name){
        return $this->$name;
    }

}