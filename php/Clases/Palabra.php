<?php

class Palabra
{
    private $idPalabra;
    private $buscar_palabra;
    private $idUsuario;

    /**
     * Palabra constructor.
     * @param $buscar_palabra
     * @param $idUsuario
     */
    public function __construct($buscar_palabra, $idUsuario)
    {
        $this->buscar_palabra = $buscar_palabra;
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getBuscarPalabra()
    {
        return $this->buscar_palabra;
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
