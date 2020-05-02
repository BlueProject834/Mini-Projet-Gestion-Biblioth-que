<?php
session_start();
$db = mysqli_connect('localhost','root','mariem','librairie')
   or die('could not connect to database'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reserver un livre</title>
</head>
<body>
<?php
if(isset($_GET['livcode']))
{
        $req = mysqli_query($db,"SELECT * FROM livres WHERE livcode='".$_GET['livcode']."' ");
		$livre=$req->fetch_assoc();
		?>
		<h2> Reserver un livre </h2><br>
		<p> Vous desirez reserver le livre suivant:</p><br>
		<table border="1">
			<tr>
				<td> Code du livre </td>
				<td> <?php echo $livre['livcode'];?></td>
			</tr>
			<tr>
				<td> Nom de l'auteur </td>
				<td> <?php echo $livre['livnomaut'];?></td>
			</tr>
			<tr>
				<td> Prenom de l'auteur </td>
				<td> <?php echo $livre['livprenomaut'];?></td>
			</tr>
			<tr>
				<td> Titre du livre </td>
				<td> <?php echo $livre['livtitre'];?></td>
			</tr>
			<tr>
				<td> Categorie </td>
				<td> <?php echo $livre['livcategorie'];?></td>
			</tr>
			<tr>
				<td> ISBN </td>
				<td> <?php echo $livre['livISBN'];?></td>
			</tr>
		</table>
		<form action="ReservLivre.php?livcode1=<?= $_GET['livcode'] ?>" method="post">
		<input name="submit" type="submit" value="Confirmer">
		</form>
		
<?php  } ?>

<?php 
if(isset($_POST["submit"]))
{
	$num=mt_rand(1000000, 9999999);
	$date1=date("Y-m-d");
	$date2=date('Y-m-d', strtotime($date1. ' + 5 days'));
			
	mysqli_query($db,"INSERT INTO emprunts(empnum, empdate, empdateret, empcodelivre, empnumlect) VALUES ('$num','$date1','$date2','".$_GET['livcode1']."','".$_SESSION['num']."')");
	mysqli_query($db,"UPDATE livres SET livdejareserve=1 WHERE livcode='".$_GET['livcode1']."'");
?>
	<h2> Confirmation de votre reservation</h2>
	<p> Votre Réservaton est confirmé sous le code : <?= $num; ?></p><br>
	<p> Date de la reservation: <?=$date1;?> </p><br>
	<p> Date de Retour du livre : <?=$date2;?> </p><br>
	<p> Vous pouvez retournez a la liste des livres disponibles a reserver en cliquant <a href='GestionLecteur.php'>ici</a><p><br>
	
<?php	
}
?>

</body>
</html>





