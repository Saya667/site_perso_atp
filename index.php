<?php
    include("php/header.php");
    $menu=\file_get_contents("data/menu.yaml");
    $infos_menu=yaml_parse($menu);

    foreach($infos_menu as $cle=>$val){
        echo '<section id="'.$cle.'">';
       // include('php/'.$cle.'.php');
       AffichagePage($cle);
        echo '</section>';
    }
    include("php/footer.php");
?>