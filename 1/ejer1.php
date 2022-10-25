<html>
<head>
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        
        <div class="primera_caja">
            <a class="link_indice" href="../index.php">INICIO</a>
            <h1 class="titulo1">Calculadora</h1>
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">

                <h2>Ejercicios</h2>

                <ul class="lista_ejercicios">
                    <li>EJERCICIOS AQUÍ</li>
                </ul>

            </div>

            <div class="segunda_columna">

                <p class="texto1">Crear una calculadora (sin orientación a objetos). Debe tener un require a un fichero calculadora.php con funciones que hagan operaciones

                    <?php 

                        ini_set('display_errors', 'On');
                        ini_set('html_errors', 0);
                        $y = 8;

                        require("calculadora.php");

                        $resultado = factorialWhile($y);

                        echo $y."! = ".$resultado;
                    ?>
                </p>

            </div>


            <div class="tercera_columna"></div>

        </div>
        <div class="tercera_caja">Clara Ruiz Ruiz - 2º DAW - Curso 22/23</div>
    <div>
</body>
</html>
