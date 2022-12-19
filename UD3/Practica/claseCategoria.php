<?php

class Categoria{

    function __construct(){

    }

    function init($id, $nombre){
        $this->id = $id;
        $this->nombre = $nombre;
    }

    function pintarCategoria($arrayCategorias){

        echo "<div class='botones'>";

        foreach($arrayCategorias as $categoria){

            echo "<div class='boton'>";

            echo "<a href='peliculas.php?categoria=$categoria->id&ordenacion=def' class='enlace'>$categoria->nombre</a>";

            echo "</div>";

        }

        echo "</div>";
          
    }
}
