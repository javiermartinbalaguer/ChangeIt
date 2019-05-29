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
class ImagenServicio {
	private $idImagenServicio;
	private $idImagen;
	private $idServicio;
	private $url;

    public function __construct($idImagen, $idServicio, $url)
    {
        $this->idImagen = $idImagen;
        $this->idServicio = $idServicio;
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

    public function getIdServicio()
    {
        return $this->idServicio;
    }

    public function setIdServicio($idServicio)
    {
        $this->idServicio = $idServicio;
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
