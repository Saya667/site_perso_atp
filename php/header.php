<!DOCTYPE html>
            <html lang='fr'>
                <head>
                    <meta charset='utf-8'>
                    <title>Site Personnel</title>
                    <link rel='preconnect' href='https://fonts.googleapis.com'>
                    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                    <link href='https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap' rel='stylesheet'>
                    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
                    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

                    <link rel='stylesheet' href='style.css'>
                </head>
                <body> 
                    <?php
                    Include 'php/functions.php';
                    $menu=\file_get_contents("data/menu.yaml");
                    $infos_menu=yaml_parse($menu);
                    echo "  <header>
                                <nav>
                                    <span>Théophile GAREL</span>    
                                    <ul>";
                    foreach ($infos_menu as $id=>$titre)
                        echo "<li ><a class=".$id." href='#".$id."'>".$titre."</a></li>";
                        echo "</ul>
                                </nav>
                                    </header>";
                    ?>
