<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Imagen
 *
 * @author cep
 */
class ImagenProducto {
    private $idImagenProducto;
    private $idImagen;
    private $idProducto;
    private $url;

    public function __construct($idImagen, $idProducto, $url)
    {
        $this->idImagen = $idImagen;
        $this->idProducto = $idProducto;
        $this->url = $url;
    }

    public function getIdImagen()
    {
        return $this->idImagen;
    }

    public function setIdImagen($idImagen)
    {
        $this->idImagen = $idImagen;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }




}
?>
