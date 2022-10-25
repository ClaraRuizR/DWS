<!-- conseguir con get un parametro y decir si es vocal, consonante o no ha pasado un texto válido-->

<html>
<head>
    <title>Ejercicio practico</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        
        <div class="primera_caja">
            <a class="link_indice" href="../index.php">INICIO</a>
            <h1 class="titulo1">Vocales</h1>
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">

                <h2>Ejercicios</h2>

                <ul class="lista_ejercicios">
                    <li>EJERCICIOS AQUÍ</li>
                </ul>

            </div>

            <div class="segunda_columna">

                <p class="texto1">

                    <?php 

                        ini_set('display_errors', 'On');
                        ini_set('html_errors', 0);

                        function obtenerParametro($parametro){
                            $resultado = "";

                            if(!empty($_GET[$parametro])){
                                $result = $_GET[$parametro];
                            }
                            
                            return $resultado;
                        }

                        function esVocal($char){
                            return in_array($char, array("a", "e", "i", "o", "u"));
                        }
                        
                        $letraObtenida = obtenerParametro("letra");

                        $esVocal = esVocal($letraObtenida);


                        if($esVocal){
                            
                        } elseif (!$esVocal){
                            echo 'La letra '.$letraObtenida.' no es vocal.';
                        } elseif($esVocal==""){
                            echo 'No has escrito unm caracter válido';
                        }

                    ?>
                </p>

            </div>


            <div class="tercera_columna"></div>

        </div>
        <div class="tercera_caja">Clara Ruiz Ruiz - 2º DAW - Curso 22/23</div>
    <div>
</body>
</html>