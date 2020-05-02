<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
	</head>
	<body>
		<h1>Gestion du Lecteur </h1>
<?php
    session_start();
    if($_SESSION['nom'] == "")
	{	
		echo '<p align="center">Le lecteur n\'est pas reconnu. identifiez vous : <a href="login.php">ici</a></p> <br>';
		echo '<p align="center"><br>Si vous etes un nouveau lecteur, inscrivez vous</p><br>';
		require 'EnregLecteur.php';
		
	}else{
	    $num= $_SESSION['num'];
        echo "Le lecteur n° $num est reconnu! <br>";
		echo  "<h2> Voici la liste des ouvrages disponibles a la reservation : </h2><br>";

				
		$mysqli = new mysqli('localhost', 'root','mariem', 'librairie');
		$mysqli->set_charset("utf8");
		$requete = 'SELECT * FROM livres';
		$resultat = $mysqli->query($requete);
		?>
		 <table border="1">
                <tr>
                    <th>CodeLivre</th>
                    <th>NomAuteur</th>
                    <th>PrenomAuteur</th>
                    <th>Titre</th>
                    <th>Categorie</th>
                    <th>ISBN</th>
                    <th> </th>
                </tr>
                <?php
		while ($ligne = $resultat->fetch_assoc()) { ?>
			<tr>
                    <td><?php echo $ligne['livcode'];?></td>
                    <td><?php echo $ligne['livnomaut'];?></td>
                    <td><?php echo $ligne['livprenomaut'];?></td>
                    <td><?php echo $ligne['livtitre'];?></td>
                    <td><?php echo $ligne['livcategorie'];?></td>
                    <td><?php echo $ligne['livISBN'];?></td>
                   <td><a href="ReservLivre.php?livcode=<?= $ligne['livcode'] ?>">Reserver</a></td>        
            </tr>
        <?php   
		}//fin de boucle
		$mysqli->close();
	?>
	</table>
	
	<h2> Voici la liste de vos reservations</h2>
	
	<?php
			$db = mysqli_connect('localhost','root','mariem','librairie')
			or die('could not connect to database'); 	
			
			$emp = mysqli_query($db,'SELECT * FROM emprunts WHERE empnumlect='.$_SESSION['num'].'');
	?>
	<table border="1">
                <tr>
                    <th>CodeLivre</th>
                    <th>NomAuteur</th>
                    <th>PrenomAuteur</th>
                    <th>Titre</th>
                    <th>Categorie</th>
                    <th>ISBN</th>
                </tr>
                <?php
		while ($livre=$emp->fetch_assoc()) { 
				//$liv=$livre['empcodelivre'];
				
				$resultat = mysqli_query($db,"SELECT * FROM livres WHERE livdejareserve=1 and livcode= '".$livre['empcodelivre']."'");

				while($resultat3=$resultat->fetch_assoc()){
		?>
			<tr>
                    <td><?php echo $resultat3['livcode'];?></td>
                    <td><?php echo $resultat3['livnomaut'];?></td>
                    <td><?php echo $resultat3['livprenomaut'];?></td>
                    <td><?php echo $resultat3['livtitre'];?></td>
                    <td><?php echo $resultat3['livcategorie'];?></td>
                    <td><?php echo $resultat3['livISBN'];?></td>      
                    
                </tr>
				<?php }  
		}//fin de boucle

	}?>
	</table>
	<h4> <a href="deconnexion.php"> Se deconnecter</a></h4>
	
	</body> 
</html>