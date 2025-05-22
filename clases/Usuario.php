<?php

class Usuario{
    public $usuario;
    public $contra;

    public function __construct($usuario, $contra){
        $this->usuario=$usuario;
        $this->contra=$contra;
    }
}

?>