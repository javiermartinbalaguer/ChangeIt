<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BuscadorPalabra
 *
 * @author Nestor
 */
class BuscadorPalabra {
    private $idBuscador;
    private $buscarPalabra;
    private $idUsuario;
    
    
    public function __construct($idBuscador, $buscarPalabra, $idUsuario)
    {
        $this->idBuscador = $idBuscador;
        $this->buscarPalabra = $buscarPalabra;
        $this->idUsuario = $idUsuario;
    }
    
    public function getIdBuscador()
    {
        return $this->idBuscador;
    }
    
    
    public function getPalabra()
    {
        return $this->buscarPalabra;
    }
    
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}
