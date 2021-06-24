<?php

//Script appelé par l'Ajax quand on change de semaine. Recoit un parametre $_POST['type'], = 'next', 'previous' ou 'today'

if ( !isset($_POST['type'])){ //Si pas de bouton selectionné (cad si on tente de venir ici par l'URL)
    header('Location:../calendarWeeks.php');
}






$type=$_POST['type'];

if($type=="previous"){

    echo "test Previous";
}
else if($type=="today"){

    echo "test Today";
}
else if($type=="next"){

    echo "test Next";
}



?>