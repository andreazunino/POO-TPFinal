<?php

require_once('menu.php');
$menu = new menu($gestion);
while (true) {
    $menu->mainMenu();
}
?>
