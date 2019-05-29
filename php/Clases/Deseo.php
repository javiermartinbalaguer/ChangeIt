<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author cep
 */
class Deseo
{
    private $idWishlist;
    private $deseo;
    private $idUsuario;

    /**
     * Favorito constructor.
     * @param $deseo
     * @param $idUsuario
     */
    public function __construct($deseo, $idUsuario)
    {
        $this->deseo = $deseo;
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getDeseo()
    {
        return $this->deseo;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }


}
?>
