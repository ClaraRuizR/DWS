<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once ("../Negocio/usuarioReglasNegocio.php");

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $usuarioBL = new UsuarioReglasNegocio();
    $perfil =  $usuarioBL->verificar($_POST['usuario'],$_POST['clave']);

    if ($perfil==="Administrador" || $perfil==="Jugador")
    {
        //SI ES JUGADOR REDIRECCIONA HACIA OTRA PANTALLA!!!!!!
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: torneosVista.php");
    }
    else
    {
        $error = true;
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <title>Registrarse</title>
</head>
<body>
    <div class="contenedor">

        <header>INICIO DE SESIÓN</header>
        <div class="paginaLogin">
            <div class="formulario">
                <form class="formularioLogin" method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input class="usuario" name="usuario" type="text" placeholder="Nombre de usuario"/>
                    <input type="password" placeholder="Contraseña" id = "clave" name = "clave"/>
                    <input clas='button' type = "submit">
                </form>
                <?php
                    if (isset($error))
                    {
                        print("<div> No tienes acceso </div>");
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
