<?php

class Categoria{

    function __construct(){

    }

    function init($id, $nombre){
        $this->id = $id;
        $this->nombre = $nombre;
    }

    function obtenerDatos(){

        $conexion = mysqli_connect('localhost','root','root');
    
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        }
    
        mysqli_select_db($conexion, 'cartelera2');
        
        //$sanitizedCategoria = mysqli_real_escape_string($conexion, $categoria);
    
        $consulta = "SELECT ID, nombre FROM T_Categorias;";
    
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
            }
    
        }
    }


    function pintarCategoria($arrayCategorias){

        echo "<div class='botones'>";

        foreach($arrayCategorias as $categoria){

            echo "<div class='boton'>";

            echo "<a href='peliculas.php?categoria=$categoria->id' class='enlace'>$categoria->nombre</a>";

            echo "</div>";

        }

        echo "</div>";
          
    }
}
