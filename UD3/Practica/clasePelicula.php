<?php

class Pelicula{

    function __construct(){

    }

    function init($idPelicula, $titulo, $anyo, $duracion, $sinopsis, $imagen, $votos, $categoria, $nombreCategoria, $nombresActores, $nombreDirector){
        $this->idPelicula = $idPelicula;
        $this->titulo = $titulo;
        $this->anyo = $anyo;
        $this->duracion = $duracion;
        $this->sinopsis = $sinopsis;
        $this->imagen = $imagen;
        $this->votos = $votos;
        $this->categoria = $categoria;
        $this->nombreCategoria = $nombreCategoria;
        $this->nombresActores = $nombresActores;
        $this->nombreDirector = $nombreDirector;
    }

    

    function pintarPelicula($arrayPeliculas, $categoria){

        echo "<div class='ordenacion'>
            <div class='botonOrden'><a href='peliculas.php?categoria=$categoria&ordenacion=titulo,asc' class='enlace'>Orden por título ascendente</a></div>
            <div class='botonOrden'><a href='peliculas.php?categoria=$categoria&ordenacion=titulo,desc' class='enlace'>Orden por título descendente</a></div>
            <div class='botonOrden'><a href='peliculas.php?categoria=$categoria&ordenacion=votos,asc' class='enlace'>Orden por votos ascendente</a></div>
            <div class='botonOrden'><a href='peliculas.php?categoria=$categoria&ordenacion=votos,desc' class='enlace'>Orden por votos descendente</a></div>
        </div>";

        echo "<div class='contenedorPeliculas$categoria'>";
    
        foreach ($arrayPeliculas as $pelicula){
    
            echo "<br>";
            echo "<div class='cuadroPelicula$pelicula->categoria'>";
    
            echo "<h2 class='tituloPelicula$pelicula->categoria'>$pelicula->titulo</h2>";
            echo "<p class='votos'>Votos: $pelicula->votos</p>";
    
            echo "<div class='contenedorImagen'><img class='imagenPeli' src='img/$pelicula->imagen' alt='imagen'></div>";
            
            echo "<div class='contenedorSinopsis$pelicula->categoria'>";
                echo "<p class='sinopsis'>$pelicula->sinopsis</p>";
                echo "<p class='textoEnlaceFicha'><a href='ficha.php?id_pelicula=$pelicula->idPelicula' class='enlaceFicha$pelicula->categoria'>Ver ficha</a></p>";
    
                echo "<div class='duracion'>Duración: $pelicula->duracion min</div>";
            echo "</div>";
    
            echo "</div>";
    
            echo "<br>";
        }
    
        echo "</div>";
        
    }

    function revisarCategoria(){
        $categoria = "-";
        $cat = htmlspecialchars($_GET["categoria"]);
        
        if(isset($cat)){
            $categoria = $cat;
        }

        return $categoria;
    }

    function revisarOrdenacion(){
        $ordenacion = "-";
        $ord = htmlspecialchars($_GET["ordenacion"]);
        
        if(isset($ord)){
            $ordenacion = $ord;
        }

        return $ordenacion;
    }

    function pintarFicha($ficha){
        echo "<div class='centro$ficha->categoria'>";

        echo "<div class='pelicula'>";

        echo "<h1 class='titulo$ficha->categoria'>$ficha->titulo</h1>";

        echo "<div class='contenedorImagen'><img class='imagenPeli' src='img/$ficha->imagen' alt='imagen'></div>";
        echo "<div class='cuerpo$ficha->categoria'>";

        echo "<div class='cuadroInfo'>";

        echo "<p class='textoInfo'> Director: $ficha->nombreDirector <br>Actores:" . $ficha->nombresActores . "<br>Año: $ficha->anyo <br>Duración: $ficha->duracion</p></div>";

        echo "<div class='cuadroSinopsis$ficha->categoria'><p class='sinopsis'>$ficha->sinopsis</p></div>";

        echo "<div class='formulario'>  
                <form action='voto.php' method='POST'>
                    <label for='id' class=''>¡Manda tu voto!</label>
                    <input id='id' name='id' type='hidden' value='$ficha->idPelicula'>
                    <input class='botonVoto' name='botonVoto' type='submit' value='Votar'>
                </form>
            </div>";

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
