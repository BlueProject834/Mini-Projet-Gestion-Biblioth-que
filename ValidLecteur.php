<?php 

// cette page est pour vérifier les données envoyées depuis le formulaire, et enregistrer le lecteur au cas de données correctes.

session_start();

function VerifierMDP($password){
	if (strlen($password) == 0) {
       echo "Le mot de passe est obligatoire";
       return false;
    }else if (strlen($password) < 8) {
        echo "<p align=center>ATTENTION : Le mot de passe doit contenir au moins 8 caracteres</p></br>";
		return false;
    }	
	return true;
}	

if(isset($_POST['submit'])){
	if($_POST['nom']&&$_POST['prenom']&&$_POST['adresse']&&$_POST['ville']&& $_POST['code'])
	{
		if(VerifierMDP($_POST['mdp']))
		{
			// se connecter a la base de donnees
			$db = mysqli_connect('localhost','root','mariem','librairie')
			or die('could not connect to database'); 		
			

			// inserer les donnees dans la base de donnees 
			$sql =mysqli_query($db,"insert into lecteurs values(NULL,'".$_POST['nom']."','".$_POST['prenom']."','".$_POST['adresse']."','".$_POST['ville']."','".$_POST['code']."','".$_POST['mdp']."');"); 
		
			$lec = mysqli_query($db,"SELECT * FROM lecteurs WHERE lecnom='".$_POST['nom']."' ");
			$lecteur=$lec->fetch_assoc();


		//	$_SESSION['nom'] = $lecteur['lecnom'] ;
		//	$_SESSION['prenom'] = $lecteur['lecprenom'] ;
		//	$_SESSION['adresse'] = $lecteur['lecadresse'] ;
		//	$_SESSION['ville'] = $lecteur['lecville'] ;
		//	$_SESSION['code'] = $lecteur['leccodepostal'] ;
		
		}
	}
}
?>

<!DOCTYPE HTML>

<html>
<head>
<title> VALIDATON LECTEUR</title>
</head>
<body>
<h1> Validation d'un lecteur </h1>
<table> 
	<tr>
		<td width="15%"> Nom :</td>
		<td ><p style="color:green;"><?php echo $lecteur['lecnom']; ?></p></td>
	</tr>
	<tr>
		<td width="15%"> Prenom :</td>
		<td ><p style="color:green;"> <?php echo $lecteur['lecprenom']; ?></p></td>
	</tr>
	<tr>
		<td width="15%"> Adresse :</td>
		<td ><p style="color:green;"><?php echo $lecteur['lecadresse']; ?> </p></td>
	</tr>
	<tr>
		<td width="15%"> Ville :</td>
		<td ><p style="color:green;"> <?php echo $lecteur['lecville']; ?></p></td>
	</tr>
	<tr>
		<td width="15%"> Code postal :</td>
		<td ><p style="color:green;"><?php echo $lecteur['leccodepostal']; ?> </p></td>
	</tr>
	<div>
		<h3 align="center"> Vous etes inscrit maintenant, vous pouvez vous <a href="login.php"> connectez ici</a></h3>
	</div>
</table>
</body>
</html>