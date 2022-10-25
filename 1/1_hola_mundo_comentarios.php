<html>
<head>
    <title>Esto es el titulo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        
        <div class="primera_caja">
            <a class="link_indice" href="../index.php">INICIO</a>
            <h1 class="titulo1">"Hola, mundo" con comentarios</h1>
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">

                <h2>Ejercicios</h2>

                <ul class="lista_ejercicios">
                    <li><a href="0_hola_mundo.php">0. Hola, mundo</a></li>
                    <li><a href="1_hola_mundo_comentarios.php">1. Hola, mundo (con comentarios)</a></li>
                    <li><a href="2.variables_y_tipos.php">2. Variables y tipos</a></li>
                    <li><a href="3.arrays_bucles.php">3. Arrays y bucles</a></li>
                    <li><a href="4.constantes.php">4. Constantes</a></li>
                    <li><a href="5.variables_super_globales.php">5. Variables super globales</a></li>
                </ul>

            </div>
            <div class="segunda_columna">
                <p class="texto1">
                    <?php 
                        echo "¡¡Hola, mundo!!";
                        print "Hello";

                        //Definir una variable
                        $color = "rojo";
                        echo "Mi coche es " . $color . "<br>";

                        //
                    ?></div>
                </p>
            <div class="tercera_columna"></div>

        </div>
        <div class="tercera_caja">Clara Ruiz Ruiz - 2º DAW - Curso 22/23</div>
    <div>
</body>
</html>