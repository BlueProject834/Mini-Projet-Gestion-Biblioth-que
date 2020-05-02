<?php
session_start();

if(isset($_POST['submit']))
{ 
	$login= $_POST['nom'];
    $password=$_POST['mdp'];


	if($login&&$password){
		$db = mysqli_connect('localhost','root','mariem','librairie')
           or die('could not connect to database');

		$query=mysqli_query($db,"SELECT * FROM lecteurs WHERE lecnom='".$_POST['nom']."' && lesmotdepasse='".$_POST['mdp']."'");
		$lecteur=$query->fetch_assoc();
		$rows = mysqli_num_rows($query);
		if($rows==1)
		{
			$_SESSION['num']= $lecteur['lecnum'];
			$_SESSION['nom'] = $lecteur['lecnom'] ;
			$_SESSION['prenom'] = $lecteur['lecprenom'] ;
			$_SESSION['adresse'] = $lecteur['lecadresse'] ;
			$_SESSION['ville'] = $lecteur['lecville'] ;
			$_SESSION['code'] = $lecteur['leccodepostal'] ;
		
			header('Location:GestionLecteur.php');

		}else echo "Login ou Mot de passe incorrecte";

	}else echo "Veuiller saisir tous les champs";
}

?>


<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
		<header>
				<H1 align="center"> Bienvenue dans votre bibliotheque virtuelle</h1>
		</header>
	
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="login.php" method="POST">
                <h1>Authentification du lecteur</h1>
                
                <label><b>Nom du lecteur :</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="nom" required>

                <label><b>Mot de passe :</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="mdp" required>

                <input type="submit" name='submit' value='submit' >
                
            </form>
        </div>
		<div>
			<h3 align="center"> Si vous n'avez pas de compte , veuillez vous inscrire<a href="EnregLecteur.php"> ici</a></h3>
		</div>
    </body>
</html>