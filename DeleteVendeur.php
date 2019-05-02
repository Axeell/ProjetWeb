 <html>  
 <body> 
     
<?php
//recuperation des données du formulaire user
//le parametre de $_POST = "name" de <input> de votre page HTML
$Pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";
     
     $error = 0;
if ($Pseudo == ""){
$error = 1;
echo "Le champ pseudo est vide";
}


//ouverture de la BDD     
$database = "ECEAmazon";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' ROOT SUR MAC
$db_handle = mysqli_connect('localhost', 'root', 'root' );
$db_found = mysqli_select_db($db_handle, $database);

 //on appuie sur le bouton puis on vérifie que la BDD existe
     if ($_POST["button"]) {
if ($db_found) {
 $sql = "SELECT * FROM Vendeur" ;
    
    //on supprime l'item grâce à son ID
$sql = "DELETE FROM Vendeur where Pseudo LIKE '%$Pseudo%' ";
$result = mysqli_query($db_handle, $sql);
 
}//end if db found
         
}//end if button
//si la BDD n'existe pas
else {
 echo "Database not found";
}//end else
//fermer la connection
mysqli_close($db_handle);
?>
</body>
</html>
