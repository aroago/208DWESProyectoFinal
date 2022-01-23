<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 11/1/2022
 * Last modification: 11/1/2022
 */
?>
<header>
    <h1>Programa LoginLogout</h1>
    <h2>Inicio</h2>
</header>
<body>
    
    <img id="imagenUsuario" src="<?php print($_SESSION['usuarioDAW208LoginLogoutMulticapaPOO']->getImagenUsuario()) ?>">
    
    <?php if ($_SESSION["usuarioDAW208LoginLogoutMulticapaPOO"]->getNumConexiones() <= 1) { ?>
        <h1><?php echo "Esta es la primera vez que te conectas!" ?></h1>
        <?php
    } else {
        ?>
        <h1><?php echo "Bienvenid@ " . $_SESSION["usuarioDAW208LoginLogoutMulticapaPOO"]->getDescUsuario() ?></h1>
        <h1><?php echo "Es la " . $_SESSION["usuarioDAW208LoginLogoutMulticapaPOO"]->getNumConexiones() . "ª vez que te conectas." ?></h1>
        <h1><?php echo "Tu ultima conexion fue el " . date("d/m/Y h:i:s",$_SESSION["usuarioDAW208LoginLogoutMulticapaPOO"]->getFechaHoraUltimaConexion()) ?></h1>
        <?php
    }
    ?>    
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
       <input type='submit' name='mtoDep' value='Mantenimiento Departamentos'/>
        <input type='submit' name='detalle' value='Detalle'/>
        <input type='submit' name='saltarError' value='Saltar_Error'/>
        <input class="button" type="submit" name="logout" value="logout"/>
    </form>
</body>