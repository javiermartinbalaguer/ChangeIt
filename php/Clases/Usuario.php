<?php

class Usuario
{
    private $idUsuario;
    private $nombre;
    private $apellido;
    private $contrasenya;
    private $correo;
    private $ciudad;
    private $telefono;
    private $imagen;
    private $confirmacion;
    private $activo;

    /**
     * Usuario constructor.
     * @param $nombre
     * @param $apellido
     * @param $contrasenya
     * @param $correo
     * @param $ciudad
     * @param $telefono
     * @param $codigoPostal
     * @param $imagen
     * @param $confirmacion
     * @param $activo
     */
    public function __construct($nombre, $apellido, $contrasenya, $correo, $ciudad, $telefono, $imagen, $confirmacion, $activo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->contrasenya = $contrasenya;
        $this->correo = $correo;
        $this->ciudad = $ciudad;
        $this->telefono = $telefono;
        $this->imagen = $imagen;
        $this->confirmacion = $confirmacion;
        $this->activo = $activo;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @return mixed
     */
    public function getContrasenya()
    {
        return $this->contrasenya;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @return mixed
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @return mixed
     */
    public function getConfirmacion()
    {
        return $this->confirmacion;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }



}
?>
