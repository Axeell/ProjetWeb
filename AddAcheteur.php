 <html>  
 <body> 
     
<?php
//recuperation des données du formulaire user
//le parametre de $_POST = "name" de <input> de votre page HTML
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
$Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : "";
$Mdp = isset($_POST["Mdp"])? $_POST["Mdp"] : "";
$Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";
$CP = isset($_POST["CP"])? $_POST["CP"] : "";
$Num = isset($_POST["Num"])? $_POST["Num"] : "";
$Pays = isset($_POST["Pays"])? $_POST["Pays"] : "";
$Email = isset($_POST["Email"])? $_POST["Email"] : "";
$Pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";
      
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
    ////on vérifie que l'acheteur n'existe pas déja grace à son pseudo (clé primaire)
    if ($Pseudo != "") {
$sql .= " WHERE Pseudo LIKE '%$Pseudo%'";
}
$result = mysqli_query($db_handle, $sql);

if (mysqli_num_rows($result) != 0) {
//l'acheteur a deja un compte
echo "Oups ! Votre compte existe deja";
    } 
    //l'acheteur n'a pas de compte
    else {
    
    //donc on insere les valeurs dans la table
$sql = "INSERT INTO Acheteur(Nom, Prenom, Adresse, Mdp, Ville, CP, Num, Pays, Email, CB, Pseudo)
 VALUES('$Nom', '$Prenom', '$Adresse', '$Mdp', '$Ville', '$CP', '$Num', '$Pays', '$Email', '$Pseudo')";
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
