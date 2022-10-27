<html>
<head><link rel="stylesheet" href="exo6.css"></head>
<body>

<table> 

    <tr>

        <td class="vert">Prenoms</td>

        <td class="vert">Notes</td>

    </tr>



<?php


$eleves = array("jimmy" => "18/20" , "halim" => "12/20" , "greg" => "7/20", "cedric" => "13/20" , "anthony" => "19/20", "oceane" => "19/20");

ksort($eleves);



 foreach($eleves as $nom => $notes) { 

   echo "<tr><td>  $nom </td><td>  $notes </td></tr>";

};

?>
</table>
</body></html>
