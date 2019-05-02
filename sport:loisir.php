
 <html>  
 <body> 
     
<?php
//identifier le nom de base de données
$database = "ECEAmazon";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' 
$db_handle = mysqli_connect('localhost', 'root', 'root' );
$db_found = mysqli_select_db($db_handle, $database);

 //si le BDD existe, faire le traitement
if ($db_found) {
 $sql = "SELECT * FROM Produits WHERE Categorie LIKE '%SP/LOI%'  " ;
 $result = mysqli_query($db_handle, $sql);
 while ($data = mysqli_fetch_assoc($result)) {

 //inutile ici    
$ImageName = $data['PicName'];
     
//cette variable recupere la photo de chaque SP/LOI
$miniature = $data['PicName'];
//on affiche que le nom du produit à coté de sa photo (les autres infos sont dans la page d'apres)
echo "Nom:" . $data['Nom'] . '<br>';

     
     //A LA PLACE DE $IMAGENAME DANS HREF METTRE LE LIEN DE LA PAGE DESCRIPTIVE DU PRODUIT DE NOTRE SITE
     //pas de target donc pas défaut ça ouvre la page dans le mm onglet (possibilité de faire retour sur la page d'avant)
echo "<a href='$ImageName'> <br>
		  <br/><img src='$miniature' 
		  width='$xsrc' height='$ysrc' border='0' alt='$ImageName'></a>";
       
   //   echo '<img src="'.$data['PicName'].'"/>';
         

 }//end while

}//end if
//si le BDD n'existe pas
else {
 echo "Database not found";
}//end else
//fermer la connection
mysqli_close($db_handle);
?>
</body>
</html>
