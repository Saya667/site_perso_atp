 <div class="contact_us">
    <script src='https://www.hCaptcha.com/1/api.js' async defer></script>
    <h1>Me contacter</h1>
    <h2>Je vous répondrai<br> au plus vite !</h2>
    
</div>

<div class="champs">
    <form action="" method="post">
        <h3>Nom*:</h3>
        <input required type="text" name="nom" placeholder="Entrez votre nom">
        <h3>E-mail*:</h3>
        <input required type="email" name="email" placeholder="Entrez l'email">
        <h3>Objet*:</h3>
        <input required type="text" name="objet" placeholder="Entrez l'email">
        <h3>Commentaire*:</h3>
        <textarea required name="comment" placeholder="Entrez votre commentaire"></textarea><br>
        <p class="rgpd">*Les données saisies ne seront pas enregistrées conformément aux normes RGPD</p>
        <div class="h-captcha" data-sitekey="6b3b0c6c-dad6-4b8b-bc00-0a714d032853"></div>
        <input class="bouton" type="submit" value="Soumettre">
    </form>
</div>
  
 <?php

include_once 'PHPMailer\vendor\autoload.php';
$ini = parse_ini_file('php/config.ini');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!empty($_POST)){

    
    if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']))
  {
        $secret = '0x9C72E4656A5A1623e34FD0241A3004402E36982a';
        $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
        $responseData = json_decode($verifyResponse);

        if($responseData->success)
        {
            $succMsg = 'Your request have submitted successfully.';

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $ini['log'];             // SMTP username
                $mail->Password = $ini['mdp'];                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
                $mail->Port = 465;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom($_POST['email']);          //This is the email your form sends From
                $mail->addAddress($ini['log']); // Add a recipient address
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $_POST['objet'];
                $mail->Body    = $_POST['comment']."<br>"." Adresse mail de l'expéditeur : ".$_POST['email']." <br> Nom de l'expéditeur : ".$_POST['nom'];
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo '<div><center><h2>Votre message a bien été envoyé</h2></center></div>';
            } catch (Exception $e) {
                echo "Votre message n'a pas pu être envoyé.";
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }
        else
        {
            $errMsg = 'Robot verification failed, please try again.';
        }
}

}



?>
