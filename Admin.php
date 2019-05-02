
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
 $sql = "SELECT * FROM admin " ;
 $result = mysqli_query($db_handle, $sql);
 while ($data = mysqli_fetch_assoc($result)) {

     
$ImageName = $data['PicName'];
$miniature = $data['PicName2'];

echo "Nom:" . $data['Nom'] . '<br>';
echo "Prénom: " . $data['Prenom'] . '<br>';
echo "Date de naissance: " . $data['DOB'] . '<br>';
echo "Pseudo: " . $data['Pseudo'] . '<br>';
echo "Email: " . $data['Email'] . '<br>';
     
     //ici la target ouvre un autre onglet
     
echo "<a href='$ImageName' target='blank'> <br>
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
