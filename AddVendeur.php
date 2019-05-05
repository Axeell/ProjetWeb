 <html>  
 <body> 
     
<?php
//recuperation des données du formulaire user
//le parametre de $_POST = "name" de <input> de votre page HTML
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
$Pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";
$Mdp = isset($_POST["Mdp"])? $_POST["Mdp"] : "";
$PicName = isset($_POST["PicName"])? $_POST["PicName"] : "";
$ImageFond = isset($_POST["ImageFond"])? $_POST["ImageFond"]:"";
$Email = isset($_POST["Email"])? $_POST["Email"] : "";

      
//ouverture de la BDD     
$database = "ece";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' ROOT SUR MAC
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

 //on appuie sur le bouton puis on vérifie que la BDD existe
     if ($_POST["button"]) {
if ($db_found) {
 $sql = "SELECT * FROM Acheteur" ;
    ////on vérifie que le vendeur n'existe pas déja grace à son pseudo
    if ($Pseudo != "") {
$sql .= " WHERE Pseudo LIKE '%$Pseudo%'";
}
$result = mysqli_query($db_handle, $sql);

if (mysqli_num_rows($result) != 0) {
//le vendeur a deja un compte
echo "Oups ! Votre compte existe deja";
    } 
    //le vendeur n'a pas de compte
    else {
    
    //donc on insere les valeurs dans la table
$sql = "INSERT INTO Vendeur(Nom, Prenom, Pseudo, Mdp, Email, PicName, ImageFond)
 VALUES('$Nom', '$Prenom', '$Pseudo', '$Mdp', '$Email', '$PicName', '$ImageFond')";
$result = mysqli_query($db_handle, $sql);
    
    //on confirme l'ajout du compte acheteur
echo "Compte bien créer" . "<br>";

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
