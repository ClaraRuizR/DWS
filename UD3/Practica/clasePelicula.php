<?php

class Pelicula{

    function __construct(){

    }

    function init($idPelicula, $titulo, $anyo, $duracion, $sinopsis, $imagen, $votos, $categoria, $nombreCategoria){
        $this->idPelicula = $idPelicula;
        $this->titulo = $titulo;
        $this->anyo = $anyo;
        $this->duracion = $duracion;
        $this->sinopsis = $sinopsis;
        $this->imagen = $imagen;
        $this->votos = $votos;
        $this->categoria = $categoria;
        $this->nombreCategoria = $nombreCategoria;
    }

    function obtenerDatos($categoria){

        $conexion = mysqli_connect('localhost','root','root');
    
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        }
    
        mysqli_select_db($conexion, 'cartelera2');
        $sanitizedCategoria = mysqli_real_escape_string($conexion, $categoria);
    
        //$consulta = "SELECT T_Peliculas.ID, titulo, año, duracion,sinopsis,  imagen, votos, id_categoria FROM T_Peliculas  WHERE id_categoria ='".$sanitizedCategoria. "'ORDER BY votos DESC;";
        $consulta = "SELECT T_Peliculas.ID, titulo, año, duracion, sinopsis, imagen, votos, id_categoria, nombre
            FROM T_Peliculas
            INNER JOIN T_Categorias ON T_Peliculas.id_categoria = T_Categorias.ID
            WHERE id_categoria ='".$sanitizedCategoria. "'ORDER BY votos DESC;";

        try{
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
                        $p->init($registro['ID'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'],  $registro['votos'], $registro['id_categoria'], $registro['nombre']);
                        $arrayPeliculas[$i] = $p;
                        $i++;
                    }
                return $arrayPeliculas;
                } else{
                    echo "No hay resultados.";
                }
            }

        }catch(mysqli_sql_exception $e){
            echo "Consulta errónea: por favor, revisa la sintaxis de tu consulta.";
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

    function pintarFicha($ficha){
        echo "<div class='centro$ficha->categoria'>";

        echo "<div class='pelicula'>";

        echo "<h1 class='titulo$ficha->categoria'>$ficha->titulo</h1>";

        echo "<div class='contenedorImagen'><img class='imagenPeli' src='img/$ficha->imagen' alt='imagen'></div>";
        echo "<div class='cuerpo$ficha->categoria'>";

        echo "<div class='cuadroInfo'>";

        echo "<p class='textoInfo'> Director: AQUÍ IRÁ EL DIRECTOR <br>Actores: AQUÍ VAN LOS ACTORES <br>Año: $ficha->anyo <br>Duración: $ficha->duracion</p></div>";

        echo "<div class='cuadroSinopsis$ficha->categoria'><p class='sinopsis'>$ficha->sinopsis</p></div>";

        echo "<div class='formulario'>  
                <form action='voto.php' method='POST'>
                    <label for='id' class=''>¡Manda tu voto!</label>
                    <input id='id' name='id' type='hidden' value='$ficha->idPelicula'>
                    <input class='botonVoto' name='botonVoto' type='submit' value='Votar'>
                </form>
            </div>";

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

    function obtenerDatosFicha($idPelicula){

        $conexion = mysqli_connect('localhost','root','root');
    
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        }
    
        mysqli_select_db($conexion, 'cartelera2');
        
        $sanitizedCategoria = mysqli_real_escape_string($conexion, $idPelicula);
    
        $consulta = "SELECT T_Peliculas.ID, titulo, año, duracion, sinopsis, imagen, votos, id_categoria, nombre 
        FROM T_Peliculas
        INNER JOIN T_Categorias ON T_Peliculas.id_categoria = T_Categorias.ID
        WHERE T_Peliculas.ID = '".$sanitizedCategoria. "';";    
        $resultado = mysqli_query($conexion, $consulta);

        try{
            if(!$resultado){
                $mensaje = 'Consulta inválida' .mysqli_error($conexion) . "\n";
                $mensaje .= 'Consulta realizada: ' . $consulta;
                die($mensaje);
            } else{
                if(($resultado->num_rows) > 0){
                    while($registro = mysqli_fetch_assoc($resultado)){
                       
                        $pelicula = new Pelicula();
                        $pelicula->init($registro['ID'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'],  $registro['votos'], $registro['id_categoria'], $registro['nombre']);
                    }
    
                return $pelicula;
                } else{
                    echo "No hay resultados.";
                }
            }

        } catch(mysqli_sql_exception $e){
            echo "Consulta errónea: por favor, revisa la sintaxis de tu consulta.";
        }
 
    }

}
