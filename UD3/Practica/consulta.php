<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once('claseCategoria.php');
require_once('clasePelicula.php');


Class Consulta {

    function __construct(){

    }

    function obtenerConsultaCategoria(){

        $conexion = mysqli_connect('localhost','root','root');
    
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        }
    
        mysqli_select_db($conexion, 'cartelera2');
    
        $consulta = "SELECT ID, nombre FROM T_Categorias;";

        try{

            $resultado = mysqli_query($conexion, $consulta);
    
            if(!$resultado){
                $mensaje = 'Consulta inválida' .mysqli_error($conexion) . "\n";
                $mensaje .= 'Consulta realizada: ' . $consulta;
                die($mensaje);
        
            } else{
        
                if(($resultado->num_rows) > 0){
        
                    $arraCategorias = [];
                    $i = 0;
                    while($registro = mysqli_fetch_assoc($resultado)){
        
                        $c = new Categoria();
                        $c->init($registro['ID'], $registro['nombre']);
                        $arrayCategorias[$i] = $c;
                        $i++;
                    }
                    
                return $arrayCategorias;
        
                } else{
                    echo "No hay resultados.";
                    return NULL;
                }
        
            }

        }catch(mysqli_sql_exception $e){
            echo "Consulta errónea: por favor, revisa la sintaxis de tu consulta.";
        }     
    }

    function obtenerNombreCategoria($idCategoria){
        $conexion = mysqli_connect('localhost','root','root');
    
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        }
    
        mysqli_select_db($conexion, 'cartelera2');
        $sanitizedCategoria = mysqli_real_escape_string($conexion, $idCategoria);
    
        
        $consulta = "SELECT nombre
            FROM T_Categorias
            WHERE ID ='".$sanitizedCategoria. "';";

        try{
            $resultado = mysqli_query($conexion, $consulta);
            if(!$resultado){
                $mensaje = 'Consulta inválida' .mysqli_error($conexion) . "\n";
                $mensaje .= 'Consulta realizada: ' . $consulta;
                die($mensaje);
        
            } else{
                if(($resultado->num_rows) > 0){

                    $registro = mysqli_fetch_assoc($resultado);
                    
                    $c = $registro['nombre'];
                    return $c;
                
                } else{
                    echo "No hay resultados.";
                }
            }

        }catch(mysqli_sql_exception $e){
            echo "Consulta errónea: por favor, revisa la sintaxis de tu consulta.";
        }
    }

    function obtenerConsultaPeliculas($categoria, $orden){

        $conexion = mysqli_connect('localhost','root','root');
    
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        }
    
        mysqli_select_db($conexion, 'cartelera2');
        $sanitizedCategoria = mysqli_real_escape_string($conexion, $categoria);

        $consulta ="SELECT
            T_Peliculas.ID, titulo, año, duracion, sinopsis, imagen, votos, id_categoria, nombre, TActores.Actores, nombre_director
        FROM 
            T_Peliculas
            INNER JOIN 
        T_Categorias ON T_Peliculas.id_categoria = T_Categorias.ID
            INNER JOIN 
        T_Directores ON T_Peliculas.id_director = T_Directores.ID
            INNER JOIN (SELECT GROUP_CONCAT(' ', nombre_actor) AS Actores, ID_Pelicula
                FROM  T_Peliculas 
                    INNER JOIN
                T_Actor_Pelicula ON T_Peliculas.ID = T_Actor_Pelicula.ID_pelicula
                    INNER JOIN 
                T_Actores ON T_Actor_Pelicula.ID_actor = T_Actores.ID  GROUP BY T_Peliculas.ID) AS TActores
        WHERE TActores.ID_Pelicula = T_Peliculas.ID AND id_categoria ='".$sanitizedCategoria. "' " . $orden .";";
    

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
                        $p->init($registro['ID'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'],  $registro['votos'], $registro['id_categoria'], $registro['nombre'], $registro['Actores'], $registro['nombre_director']);
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

    function obtenerConsultaFicha($idPelicula){

        $conexion = mysqli_connect('localhost','root','root');
    
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        }
    
        mysqli_select_db($conexion, 'cartelera2');
        
        $sanitizedCategoria = mysqli_real_escape_string($conexion, $idPelicula);

        $consulta ="SELECT
            T_Peliculas.ID, titulo, año, duracion, sinopsis, imagen, votos, id_categoria, nombre, TActores.Actores, nombre_director
        FROM 
            T_Peliculas
            INNER JOIN 
        T_Categorias ON T_Peliculas.id_categoria = T_Categorias.ID
            INNER JOIN 
        T_Directores ON T_Peliculas.id_director = T_Directores.ID
            INNER JOIN (SELECT GROUP_CONCAT(' ', nombre_actor) AS Actores, ID_Pelicula
                FROM  T_Peliculas 
                    INNER JOIN
                T_Actor_Pelicula ON T_Peliculas.ID = T_Actor_Pelicula.ID_pelicula
                    INNER JOIN 
                T_Actores ON T_Actor_Pelicula.ID_actor = T_Actores.ID  GROUP BY T_Peliculas.ID) AS TActores
        WHERE TActores.ID_Pelicula = T_Peliculas.ID AND T_Peliculas.ID = '".$sanitizedCategoria. "';";

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
                        $pelicula->init($registro['ID'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'],  $registro['votos'], $registro['id_categoria'], $registro['nombre'], $registro['Actores'], $registro['nombre_director']);
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

    function sumarVoto($idPelicula){

        $conexion = mysqli_connect('localhost','root','root');
        
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        } 
        mysqli_select_db($conexion, 'cartelera2');
        
        $sanitizedId= mysqli_real_escape_string($conexion, $idPelicula);
        
        $consulta = "UPDATE T_Peliculas SET votos = votos + 1 WHERE ID = '".$sanitizedId. "';";  

        
        try{
            $resultado = mysqli_query($conexion, $consulta);
            
            if(!$resultado){
                $mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
                $mensaje .= 'Consulta realizada: ' . $consulta;
                die($mensaje);
        
            } else if ($resultado){
                $mensaje = "Voto guardado con éxito.";
                
                return $mensaje;
            }

        }catch(mysqli_sql_exception $e){
            $mensaje = "Consulta errónea: por favor, revisa la sintaxis de tu consulta.";
            return $mensaje;
        }
        
    }

}