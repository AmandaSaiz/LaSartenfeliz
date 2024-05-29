<?php
function display_breadcrumbs() {
    $path = $_SERVER['REQUEST_URI'];
    $path = trim($path, '/');
    $pathParts = explode('/', $path);

    $crumbPath = '/';
    $breadcrumbs = '';

    foreach ($pathParts as $key => $part) {
        $crumbPath .= $part . '/';
        $name = ucfirst(str_replace(['-', '_'], ' ', $part));

        if ($key == count($pathParts) - 1) {
            $breadcrumbs .= "<span>$name</span>";
        } else {
            $breadcrumbs .= "<a href='$crumbPath'>$name</a> &gt; ";
        }
    }

    echo $breadcrumbs;
}
?>
