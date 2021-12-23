x   <?php
    function AffichagePage($nom_page){

        /*$informations=\file_get_contents("data/$nom_page.yaml");
        $information=yaml_parse($informations);*/
        $informations=yaml_parse_file("data/$nom_page.yaml");
        
        if ($nom_page=='contact'){
            include ('contact.php');
        }

        elseif ($nom_page=='a_propos'){
            include ('a_propos.php');
        }    
        
        else{

            foreach($informations as $info){
                echo "<article>";
    
                foreach($info as $cle=>$valeur){

             
                    if ($cle=='Image'){
                        echo "<div class=div_img>
                        <img alt='image_$valeur' src='$valeur'>
                        </div>";
                    }

                    elseif($cle=='Texte'){
                        echo "<p>$valeur</p>";
                    }

                    else{
                        echo "<p><label>$cle :</label>
                        $valeur</p><br>";
                    }
                }    
                echo "</article>";
        
            }
        }
    }    
?>