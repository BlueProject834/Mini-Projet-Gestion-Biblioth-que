<!DOCTYPE html>

<!-- cette page est un simple formulaire pour récupérer les données du lecteur seulement.-->


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
<title>Inscription</title>
<style type="text/css">
table { border-collapse: collapse;  border-spacing:0;} td { border-spacing: 0; border-collapse: collapse;}
.Style1 {   font-size: 15px;  font-family: "Segoe Print";   color: Black;    font-weight: bold;}
.Style2 {   font-size: 24px; color: #0033FF;}
.Style4 {   color:#FFFFFF;   font-family: "Segoe Print";   font-size: 24px;   font-weight: bold;}
.Style5 {	color: white;   font-family: Calibri;   font-weight: bold;    font-size: 22px;}
h2{	 font-family: "Segoe Print";	 font-size: 18px;}
.Style3 {	color:#FA8072;   font-family: "Segoe Print";   font-weight: bold;    font-size: 26px;}
</style>
</head>
<body>

<div id="container">
<form method="post" action="ValidLecteur.php"> 
 <div class="Style1"><h1>Enregistrement d'un lecteur</h1></div>
 
	Nom : 
	<INPUT type="text" name="nom" width="1000"> <br>

	Prenom :
    <INPUT type="text" name="prenom"> <br> 
 
	Adresse :
    <INPUT type="text" name="adresse"> <br>

	Ville :
	<INPUT type="text" name="ville"> <br>

	Code Postal :
    <INPUT type="text" name="code"> <br>
 
	Mot de passe :
    <INPUT type="password" name="mdp"> <br>
	
	<INPUT type="submit" name="submit" value="Enregistrer"> 
</div>
</body>
</html>
