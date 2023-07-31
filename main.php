<?php

require_once('menu.php');
$menu = new menu($gestionEstudiante,$gestionCurso);
while (true) {
    $menu->mainMenu();
}
?>
