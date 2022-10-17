<html>
<head>
<title>
Connexion à MySQL avec PDO
</title>
<meta charset="utf-8">
<link rel="stylesheet" href="tabstyle.css" />
</head>
<body>
<h1>
Interrogation de la table voitures avec PDO
</h1>
<form method="get">
    <label for="s">Rechercher par Marque:</label>
    <input type="search" name="s" placeholder="Rechercher une marque" autocomplete="off">
    <input type="submit" name="envoyer">
    <br/>
    <label for="carburant">Filtrer par carburant:</label>
    <input type="search" name="carburant">
    <br/>
    <label for="modele">Filtrer par modele:</label>
    <input type="search" name="modele">
</form>
<?php

require("connect.php");
function connect_bd(){
	$dsn="mysql:dbname=".BASE.";host=".SERVER;
		try{
		$connexion=new PDO($dsn,USER,PASSWD);
		}
		catch(PDOException $e){
		printf("Échec de la connexion : %s\n", $e->getMessage());
		exit();
		}
	return $connexion;
  }

?>

<?php
require_once('connect.php');
$connexion=connect_bd();
$sql="SELECT * from voiture";
if(!$connexion->query($sql)) echo "Pb d'accès au CARNET";
else{
?>
<!-- <table class="centre" id="jolie"> -->
<!-- <tr> <td> Id_voiture </td> <td> Marques </td> <td> Modele </td><td> Année modele </td> <td> Mise en circulation </td><td> Type de vehicule </td><td> Kilometrage </td><td> Carburant </td><td> Couleur </td><td> Nombre de portes </td><td> Nombre de place </td><td> Puissance fiscale </td><td> Puissance din </td><td> Permis </td><td> Crit'air </td><td> Boite de vitesse </td></tr> -->
  <?php
  // foreach ($connexion->query($sql) as $row)
// echo "<tr><td>".$row['Id_Voiture']."</td>
          // <td>".$row['Marques']."</td>
          // <td>".$row['modele']."</td>
          // <td>".$row['Annee_modele']."</td>
          // <td>".$row['Mise_en_circulation']."</td>
          // <td>".$row['Type_de_vehicule']."</td>
          // <td>".$row['Kilometrage']."</td>
          // <td>".$row['Carburant']."</td>
          // <td>".$row['couleur']."</td>
          // <td>".$row['nombre_de_porte']."</td>
          // <td>".$row['nombre_de_place']."</td>
          // <td>".$row['puissance_fiscale']."</td>
          // <td>".$row['puissance_din']."</td>
          // <td>".$row['permis']."</td>
          // <td>".$row['critaire']."</td>
          // <td>".$row['boite_de_vitesse']."</td></tr><br/>\n";
         // var_dump($sql);
  ?>
  <?php
  $allcars = $connexion->query($sql);
  if(isset($_GET['s']) or isset($_GET['carburant']) or isset($_GET['modele'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $carburant = ($_GET['carburant']);
    $modele = ($_GET['modele']);
    $allcars = $connexion->query( 'SELECT * FROM voiture WHERE concat(Marques,Carburant,modele) LIKE "%'.$recherche.'%"');
    $conditions = array();

  // if(!empty($Marque)){
    // $conditions[] = 
  // }
  // }

    
echo($recherche);
echo($carburant);
echo($modele);
  ?>
</table>
<section class="afficher_marque">
        <?php
        if($allcars->rowcount() > 0){
            while($Marque = $allcars->fetch()){
               ?>
        <p><?=
        "<table><tr><td>"
        . $Marque['Marques'] . "</td>
        <td>" . $Marque['Carburant'] . "</td>
        <td>" . $Marque['modele'] . " </td> 
        </tr></table>\n";
        ?>  
        </p>
        <?php
         } }else{ ?>
        <p>Aucune Marque trouvée</p>
        <?php
    } 
    ?>
    </section>
<?php } ?>

</body>
</html>