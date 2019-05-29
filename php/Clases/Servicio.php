<?php

class Servicio {
    private $idServicio;
    private $idUsuario;
    private $nombre;
    private $ciudad;
    private $descripcion;
    private $precio;
    private $tema;

    public function __construct($idUsu,$nom,$ciu,$desc,$precioServ,$temaServ) {
        $this->idUsuario = $idUsu;
        $this->nombre = $nom;
        $this->ciudad = $ciu;
        $this->descripcion = $desc;
        $this->precio = $precioServ;
        $this->tema = $temaServ;
    }

    public function getIdUsuario(){
        return $this->idUsuario ;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getCiudad(){
        return $this->ciudad;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getTema(){
        return $this->tema;
    }

}
?>
