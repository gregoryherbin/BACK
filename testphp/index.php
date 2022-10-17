<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       
       // $ = variable
        
        $name = 'Greg';
        $sexe = 'homme';
        
        // . = concatenation (+)
        // echo permet d'afficher dans le document
        
        echo '<p> Bonjour ' . $name . '</p>';
        
        // Condition php
        
        if ($sexe == "homme") {
            echo '<p> Tu es un homme </p>';
        } else {
            echo '<p> Tu es une femme</p>';
        }

        //Boucle php
        
        for ($nombre_de_lignes = 1; $nombre_de_lignes <= 10; $nombre_de_lignes++) {
            echo 'Ceci est la ligne n°' . $nombre_de_lignes . '<br />';
        }
       
        //Tableau php
        
        $tableau = ['pomme','poire'];                           
        echo $tableau[1];

        //INCLUDE permet d'appeler des fonctions d'un autre fichier php
        
        include 'mesfonctions.php';                             
        afficherBonjour('Jean');

        

    ?>

</body>
</html>