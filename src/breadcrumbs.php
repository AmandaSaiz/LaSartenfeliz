<?php
// Esta función (migas de pan) permite mostrar el lugar en el que nos necontramos en cada momento.

function getPageName($filename)
{
    $pageNames = array(
        'index.php' => 'Inicio',
        'login.html' => 'Inicio de Sesión',
        'nuevaReceta.php' => 'Receta Nueva',
        'contacto.php' => 'Contacto',
        'construccion.php' => 'Página en Construcción',
        'perfil.php' => 'Perfil de Usuario',
        'entrantes.php' => 'Listado de Entrantes',
        'platosPrincipales.php' => 'Listado de Platos Principales',
        'postres.php' => 'Listado de Postres',
        'cocteles.php' => 'Listado de Cócteles',
    );

    return isset($pageNames[$filename]) ? $pageNames[$filename] : $filename;
}

function generateBreadcrumbs()
{
    $paginaActual = basename($_SERVER['PHP_SELF']);

    $breadcrumbs = '';

    if ($paginaActual !== 'index.php') {
        $breadcrumbs .= '<a href="index.php"><span>Inicio</span></a>';
        $pageTitle = getPageName($paginaActual);
        $breadcrumbs .= " <span>&gt; $pageTitle</span>";
    } else {
        $breadcrumbs .= '<span>Inicio</span>';
    }

    echo $breadcrumbs;
}
?>
