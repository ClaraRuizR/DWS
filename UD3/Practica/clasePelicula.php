<?php

class Pelicula{

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

    function obtenerDatos($categoria){

        $conexion = mysqli_connect('localhost','root','root');
    
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        }
    
        mysqli_select_db($conexion, 'cartelera2');
        $sanitizedCategoria = mysqli_real_escape_string($conexion, $categoria);
    
        $consulta = "SELECT T_Peliculas.ID, titulo, año, duracion,sinopsis,  imagen, votos, id_categoria FROM T_Peliculas  WHERE id_categoria ='".$sanitizedCategoria. "'ORDER BY votos DESC;";
    
        $resultado = mysqli_query($conexion, $consulta);
    
        if(!$resultado){
            $mensaje = 'Consulta inválida' .mysqli_error($conexion) . "\n";
            $mensaje .= 'Consulta realizada: ' . $consulta;
            die($mensaje);
    
        } else{
    
            if(($resultado->num_rows) > 0){
    
                $arrayPeliculas = [];
                $i = 0;
                while($registro = mysqli_fetch_assoc($resultado)){
                     
                    $p = new Pelicula();
                    $p->init($registro['ID'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'],  $registro['votos'], $registro['id_categoria']);
                    $arrayPeliculas[$i] = $p;
                    $i++;
                }
    
            return $arrayPeliculas;
    
            } else{
                echo "No hay resultados.";
            }
    
            
        }
    }

    function pintarPelicula($arrayPeliculas, $categoria){


        echo "<div class='contenedorPeliculas$categoria'>";
    
        foreach ($arrayPeliculas as $pelicula){
    
            echo "<br>";
            echo "<div class='cuadroPelicula$pelicula->categoria'>";
    
            echo "<h2 class='tituloPelicula$pelicula->categoria'>$pelicula->titulo</h2>";
            echo "<p class='votos'>Votos: $pelicula->votos</p>";
    
            echo "<div class='contenedorImagen'><img class='imagenPeli' src='img/$pelicula->imagen' alt='imagen'></div>";
            
            echo "<div class='contenedorSinopsis$pelicula->categoria'>";
                echo "<p class='sinopsis'>$pelicula->sinopsis</p>";
                echo "<p class='textoEnlaceFicha'><a href='ficha.php?id_pelicula=$pelicula->idPelicula' class='enlaceFicha'>Ver ficha</a></p>";
    
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

}
