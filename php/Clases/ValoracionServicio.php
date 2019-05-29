<?php

class ValoracionServicio
{
    private $idValoracionServicio;
    private $idServicio;
    private $idUsuarioCompra;
    private $idUsuarioVende;
    private $valoracion;
    private $observaciones;

    /**
     * ValoracionProducto constructor.
     * @param $idProducto
     * @param $idUsuarioCompra
     * @param $idUsuarioVende
     * @param $valoracion
     * @param $observaciones
     */
    public function __construct($idServicio, $idUsuarioCompra, $idUsuarioVende, $valoracion, $observaciones)
    {
        $this->idServicio = $idServicio;
        $this->idUsuarioCompra = $idUsuarioCompra;
        $this->idUsuarioVende = $idUsuarioVende;
        $this->valoracion = $valoracion;
        $this->observaciones = $observaciones;
    }

    /**
     * @return mixed
     */
    public function getIdServicio()
    {
        return $this->idServicio;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioCompra()
    {
        return $this->idUsuarioCompra;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioVende()
    {
        return $this->idUsuarioVende;
    }

    /**
     * @return mixed
     */
    public function getValoracion()
    {
        return $this->valoracion;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }



}
?>
