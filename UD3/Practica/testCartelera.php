<?php

    require_once('consulta.php');
    require_once('claseCategoria.php');
    require_once('clasePelicula.php');


    function testObtenerConsultaCategoriaCorrecta(){

        $c1 = new Categoria();
        $c1->init(1, "Terror");

        $c2 = new Categoria();
        $c2->init(2, "Ciencia-Ficción");

        $q = new Consulta();

        $resultadoEsperado = [$c1, $c2];

        $resultado = $q->obtenerConsultaCategoria();

        return ($resultado == $resultadoEsperado);
    }

    function testObtenerConsultaCategoriaErronea(){

        $c1 = new Categoria();
        $c1->init(1, "Terror");

        $c2 = new Categoria();
        $c2->init(2, "Ciencia-Ficción");

        $q = new Consulta();

        $resultadoEsperado = [$c1, $c1];

        $resultado = $q->obtenerConsultaCategoria();

        return ($resultado == $resultadoEsperado);
    }

    function testObtenerNombreCategoriaCorrecta(){
        $categoria = 1;
        $q = new Consulta;

        $resultadoEsperado = "Terror";

        $resultado = $q->obtenerNombreCategoria($categoria);

        return ($resultado == $resultadoEsperado);
    }

    function testObtenerConsultaPeliculasCorrecto(){
        $categoria = 1;
        $orden = '';

        $q = new Consulta();

        $p1 = new Pelicula();
        $p2 = new Pelicula();
        $p3 = new Pelicula();
        $p4 = new Pelicula();
        $p5 = new Pelicula();

        $arrayPeliculas = [$p1, $p2, $p3, $p4, $p5];
        $resultadoEsperado = count($arrayPeliculas);

        $datosCategoria = $q->obtenerConsultaPeliculas($categoria, $orden);        
        $resultado = count($datosCategoria);

        return ($resultado == $resultadoEsperado);
    }

    function testobtenerConsultaFichaCorrecta(){
        $q = new Consulta();
        $idPelicula = '10';

        $p1 = new Pelicula();
        $p1->init('10', 'Drácula de Bram Stoker', '1993', '128', 'En 1890, el abogado Jonathan Harker tiene que viajar a Transilvania, al este de Europa, para solucionar con un tal conde Drácula unos aspectos del contrato de la casa que acababa de adquirir en Londres.El Conde no es el tipo de hombre que el joven Harker esperaba conocer. ', 'terror5.jpg', '0', '1', 'Terror', ' Gary Oldman, Winona Ryder', 'Francis Ford Coppola');

        $resultadoEsperado = $p1;

        $resultado = $q->obtenerConsultaFicha($idPelicula);  

        return ($resultado == $resultadoEsperado);
    }

    function test($testEjecutar){
        try {
            echo "<br>";
            $resultadoTest = $testEjecutar();
            $mensaje = 'El test: '.$testEjecutar.' ';
            $mensajeResultado = $resultadoTest ? 'OK' : 'KO';
            echo $mensaje.$mensajeResultado;

        }
        catch(Exception $e){
            echo "<br>"."Se ha producido una excepción al ejecutar:".$testEjecutar."<br>";

        } 
    }

    echo"Tests de categoria<br><br>";
    
    test("testObtenerConsultaCategoriaCorrecta");
    test("testObtenerConsultaCategoriaErronea");

    echo"<br><br>Tests de pelicula<br>";
    test("testObtenerNombreCategoriaCorrecta");
    test("testObtenerConsultaPeliculasCorrecto");

    echo"<br><br>Tests de ficha<br>";
    test("testobtenerConsultaFichaCorrecta");

