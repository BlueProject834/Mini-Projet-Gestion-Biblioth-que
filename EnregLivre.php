<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
<title>Inscription</title>
<style type="text/css">
table { border-collapse: collapse;  border-spacing:0;} td { border-spacing: 0; border-collapse: collapse;}
.Style1 {   font-size: 15px;  font-family: "Segoe Print";   color: Black;    font-weight: bold;}
</style>
</head>
<body>

<div id="container">
  
<form method="post" action="ValidLivre.php"> 
 <div class="Style1"><h1>Enregistrement d'un livre</h1></div>
 Code Livre:
     <INPUT type="text" name="codeLiv">
 
  Nom de l'auteur : <INPUT type="text" name="nomAut" width="1000"> 

  Prenom de l'auteur :
     <INPUT type="text" name="prenomAut">  
 
   Titre :
      <INPUT type="text" name="titreLiv"> 

<label>Categorie:</label>

<select name="categorieLiv" id="categorie" required>
    <option value="">--Please choose an option--</option>
    <option value="roman">Roman</option>
    <option value="junior">Junior</option>
    <option value="Science-fiction">Science-fiction</option>
</select>
</br>
</br>
 Numero ISBN :
     <INPUT type="text" name="numISBN"> 
 
 Deja reserve :
     <INPUT type="text" name="res"> 
   <INPUT type="submit" name="submit" value="Enregistrer"> 

 

</div>

</body>
</html>
