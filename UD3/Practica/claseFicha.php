<?php

class Ficha{

    function __construct(){

    }

    function init($idPelicula, $titulo, $anyo, $duracion, $sinopsis, $imagen, $votos, $categoria){
        $this->idPelicula = $idPelicula;
        $this->titulo = $titulo;
        $this->anyo = $anyo;
        $this->duracion = $duracion;
        $this->sinopsis = $sinopsis;
        $this->imagen = $imagen;
        $this->votos = $votos;
        $this->categoria = $categoria;
    }

    function obtenerDatosFicha($idPelicula){

        $conexion = mysqli_connect('localhost','root','root');
    
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        }
    
        mysqli_select_db($conexion, 'cartelera2');
        
        $sanitizedCategoria = mysqli_real_escape_string($conexion, $idPelicula);
    
        $consulta = "SELECT T_Peliculas.ID, titulo, año, duracion, sinopsis, imagen, votos, id_categoria FROM T_Peliculas  WHERE ID = '".$sanitizedCategoria. "';";    
        $resultado = mysqli_query($conexion, $consulta);
    
        if(!$resultado){
            $mensaje = 'Consulta inválida' .mysqli_error($conexion) . "\n";
            $mensaje .= 'Consulta realizada: ' . $consulta;
            die($mensaje);
    
        } else{
    
            if(($resultado->num_rows) > 0){

                while($registro = mysqli_fetch_assoc($resultado)){
                   
                    $f = new Ficha();
                    $f->init($registro['ID'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'],  $registro['votos'], $registro['id_categoria']);
                    
                }

            return $f;
    
            } else{
                echo "No hay resultados.";
            }
    
        }
    }


    function pintarFicha($ficha){
        echo "<div class='centro$ficha->categoria'>";

        echo "<div class='pelicula'>";

        echo "<h1 class='titulo$ficha->categoria'>$ficha->titulo</h1>";

        echo "<div class='contenedorImagen'><img class='imagenPeli' src='img/$ficha->imagen' alt='imagen'></div>";
        echo "<div class='cuerpo$ficha->categoria'>";

        echo "<div class='cuadroInfo'>";

        echo "<p class='textoInfo'> Director: AQUÍ IRÁ EL DIRECTOR <br>Actores: AQUÍ VAN LOS ACTORES <br>Año: $ficha->anyo <br>Duración: $ficha->duracion</p></div>";

        echo "<div class='cuadroSinopsis$ficha->categoria'><p class='sinopsis'>$ficha->sinopsis</p></div>";

        echo "  <form action='voto.php' method='POST'>
                    <label for='id'>¡Manda tu voto!</label>
                    <input id='id' name='id' type='hidden' value='$ficha->idPelicula'>
                    <input id='botonVoto' name='botonVoto' type='submit' value='Votar'>
                </form>";

        //echo "<div class='cuadroVotos'><p class='textoVoto'>Voto</p></div>";

        echo "</div>";

        echo "</div>";

        echo "</div>";
          
    }

    function revisarId(){
        $idPelicula = "-";
        $id = htmlspecialchars($_GET["id_pelicula"]);
        
        if(isset($id)){
            $idPelicula = $id;
        }
        return $idPelicula;
    }
}