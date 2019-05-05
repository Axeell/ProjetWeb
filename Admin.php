<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="index.css" rel="stylesheet">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>    

</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <!-- Brand -->
  <a class="navbar-brand" href="index.html">ECE AMAZON</a>

  <!-- Links -->
  <ul class="navbar-nav">
      
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Catégories
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="livre.html">Livres</a>
        <a class="dropdown-item" href="musique.html">Musiques</a>
      <a class="dropdown-item" href="vetement.html">Vetements</a>
      <a class="dropdown-item" href="sport.html">Sport et loisirs</a>
      </div>
    </li>
      
    <li class="nav-item">
      <a class="nav-link" href="vente.html">Ventes Flash</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="vendre.html">Vendre</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="compte.html">Compte</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="panier.html">Panier</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admin.html">Admin</a>
    </li>
    <li style="float:right" class="nav-end">
    <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button>
    </form>
    </li>
      
    </ul>
    
    </nav>
    
<div class="sidenav">
  <a  href="#livre">Livres</a>
  <a href="#musique">Musiques</a>
  <a href="#vetement">Vêtements</a>
  <a href="#sport&loisir">Sports et loisirs</a>
</div>

<div class="main">
<div id="livre" class="container-fluid">
<div class="row">
<div class="col" style="background-color:floralwhite;">
<div class="content5">    
    <?php
//identifier le nom de base de données
$database = "ece";

//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' 
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

 //si le BDD existe, faire le traitement
if ($db_found) {
 $sql = "SELECT * FROM admin " ;
 $result = mysqli_query($db_handle, $sql);
    echo "<table border='0' width='100%'><tr>";
    $NbrImgParLigne = 3;
	$NumImgLigne = 0;
 while ($data = mysqli_fetch_assoc($result)) {
     
     
     if ($NumImgLigne>=$NbrImgParLigne)
		 {
			 echo "</tr><tr>";
			 $NumImgLigne = 0;
		 } 

		 $NumImgLigne++;
     
   echo "<td align='center'>";

     
$ImageName = $data['PicName'];
$miniature = $data['PicName2'];

echo "Nom:" . $data['Nom'] . '<br>';

     
     //ici la target ouvre un autre onglet
     
echo "<a href='detailL.html' target='blank'> <br>
		  <br/><img src='$miniature' 
          width='$xsrc' height='$ysrc' border='0'
		  alt='$ImageName'></a> </td>";
     
      

         

 }//end while
    echo  "</tr></table>";

}//end if
//si le BDD n'existe pas
else {
 echo "Database not found";
}//end else
//fermer la connection
mysqli_close($db_handle);
?>
</div>
</div>
<div class="col" style="background-color:floralwhite;">
<div class="content5">    
    
    
</div>
</div>
</div>
</div> 
</div>
    
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>
</html>
