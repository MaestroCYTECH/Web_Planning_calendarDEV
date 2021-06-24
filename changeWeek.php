<?php

//Script appelé par l'Ajax quand on change de semaine. Recoit un parametre $_POST['type'], = 'next', 'previous' ou 'today'

if ( !isset($_POST['type'])){ //Si pas de bouton selectionné (cad si on tente de venir ici par l'URL)
    header('Location:../calendarWeeks.php');
}
if ( !isset($_POST['ID'])){ 
    header('Location:../calendarWeeks.php');
}
if ( !isset($_POST['currDate'])){ 
    header('Location:../calendarWeeks.php');
}



$type=$_POST['type'];
$ID=$_POST['ID'];
$currDate=$_POST['currDate'];
/*
echo $ID;
echo $type;
echo $currDate;
*/



if($type=="previous"){ 
    
//Calculer la date 7 jours avant currDate

    
}
else if($type=="today"){


}
else if($type=="next"){


}



?>