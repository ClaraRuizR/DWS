<html>
<head>
    <title>Esto es el titulo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        
        <div class="primera_caja">
            <a class="link_indice" href="../index.php">INICIO</a>
            <h1 class="titulo1">TÍTULO AQUÍ</h1>
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
                        
                        function validarParametro($par){
                            $res = "-";
                            $existe_parametro = contieneClave($par, $_GET);

                            if($existe_parametro){

                                $name = htmlspecialchars($_GET[$parameter],ENT_QUOTES);
                                    if(isset($name)){
                                        $res = $name;
                                    }
                            

                            }

                            return $res;

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