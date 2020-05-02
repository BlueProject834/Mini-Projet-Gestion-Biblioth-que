<?php
session_start();

?>

<?php
if(isset($_POST['submit'])){
    
   /* on test si les champ sont bien remplis */
    if($_POST['nomAut']&&$_POST['prenomAut']&&$_POST['titreLiv']&&$_POST['codeLiv']&& $_POST['numISBN'])
    {
	  
	  
		$db = mysqli_connect('localhost','root','mariem','librairie')
           or die('could not connect to database');    

        $reg = mysqli_query($db,"SELECT * FROM livres WHERE livnomaut='".$_POST['nomAut']."' ");
        $rows = mysqli_num_rows($reg);

        if($rows==0){
			//On créé la requête
            $sql =mysqli_query($db,"INSERT INTO livres VALUES ('".$_POST['codeLiv']."','".$_POST['nomAut']."','".$_POST['prenomAut']."','".$_POST['titreLiv']."','".$_POST['categorieLiv']."','".$_POST['numISBN']."','".$_POST['res']."')"); 
			echo "\n done";
	  
		$liv = mysqli_query($db,"SELECT * FROM livres WHERE livcode='".$_POST['codeLiv']."' ");
		$lecteur=$liv->fetch_assoc();
        
		
		}else echo"ce livre est deja dans la base de donnees";

    } else echo "Veuillez saisir tous les champs !";  
 }
?>


<!DOCTYPE html>
<html>
<head>
<title> VALIDATON Livre</title>
</head>
<body>
<h1> Validation d'un livre </h1>
<table> 
	<tr>
		<td width="15%"> Nom de l'auteur:</td>
		<td ><p style="color:green;"><?php echo $lecteur['livnomaut']; ?></p></td>
	</tr>
	<tr>
		<td width="15%"> Prenom de l'auteur:</td>
		<td ><p style="color:green;"> <?php echo $lecteur['livprenomaut']; ?></p></td>
	</tr>
	<tr>
		<td width="15%"> Titre :</td>
		<td ><p style="color:green;"><?php echo $lecteur['livtitre']; ?> </p></td>
	</tr>
	<tr>
		<td width="15%"> Categorie :</td>
		<td ><p style="color:green;"> <?php echo $lecteur['livcategorie']; ?></p></td>
	</tr>
	<tr>
		<td width="15%"> Numero ISBN :</td>
		<td ><p style="color:green;"><?php echo $lecteur['livISBN']; ?> </p></td>
	</tr>
</table>
</body>
</html>