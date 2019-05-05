

<?php


 ini_set( 'display_errors', 1 );
 error_reporting( E_ALL );
 

//Variables du formulaire
$email = isset($_POST["email"])? $_POST["email"] : "";
$message = isset($_POST["message"])? $_POST["message"] : "";

 
// Mail
$objet = 'Confirmation de votre réservation' ;
$contenu = $message ; 
    
$headers ='From: "nom"<example@example.com>'."\n"; 
     $headers .='Reply-To: example@example.com'."\n"; 
     $headers .='Content-Type: text/plain; charset="utf-8"'."\n"; 
     $headers .='Content-Transfer-Encoding: 8bit'; 

                         
//Envoi du mail
if(mail($email, $objet, $contenu, $headers))
{
    
  
echo "Email envoyé" ; 
  
}

else 
{
    
   echo "échec" ;   
}
   

?>


