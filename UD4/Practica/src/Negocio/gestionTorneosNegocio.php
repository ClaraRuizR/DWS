<?php

require_once('../Infraestructura/gestionTorneosAccesoDatos.php');

class GestionJugadoresNegocio{

    private $_ID;
    private $nombre;

    function __construct()
    {
    }

    function init($id, $nombre)
    {
        $this->_ID = $id;
        $this->nombre = $nombre;

    }

    function getID()
    {
        return $this->_ID;
    }

    function getNombre()
    {
        return $this->nombre;
    }


    function obtener()
    {
        $jugadores = new GestionJugadoresAccesoDatos();
        $rs = $jugadores->obtener();

		$listaJugadores =  array();

        foreach ($rs as $jugador)
        {
            $jugadoresReglasNegocio = new GestionJugadoresNegocio();
            $jugadoresReglasNegocio->Init($jugador['ID'], $jugador['nombre']);
            array_push($listaJugadores,$jugadoresReglasNegocio);
         
        }
                
        return $listaJugadores;
    }

    function buscarJugador($idJugador){
        $jugadores = $this->obtener();

        foreach ($jugadores as $jugador){
            if($jugador->_ID == $idJugador){
                return $jugador;
            }
        }
    }

}
// $id = 5;
//  $a = new GestionJugadoresNegocio();
//  $b = $a->buscarJugador($id);
// var_dump($b);
