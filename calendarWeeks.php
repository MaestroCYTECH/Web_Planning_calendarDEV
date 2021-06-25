<?php


//Si on vient ici par l'AJAX, pour mettre à jour les semaines : 

if ( isset($_POST['type']) && $_POST['Request']=="changeWeeks" && isset($_POST['dateLundi'])) { 

    $type=$_POST['type'];
    $dateLundi=$_POST['dateLundi'];
    
    //Convertit le string donné vers le format date :
    $date = date_create($dateLundi); //Date simulée avant l'Ajax



    if($type=="previous"){  
        //Calculer la date 7 jours avant la date actuelle

        date_modify($date, '-7 day'); //Nouvelle date du lundi, à partir de la quelle on veut calculer toute la semaine
    }

    else if($type=="today"){
    
        $date = strtotime('monday this week');
        $date=date("Y-m-d", $date);
        $date = date_create($date); //Lundi de la semaine actuelle

    }

    else if($type=="next"){
        
        date_modify($date, '+7 day');

    }



   /* else if($type=="year"){ //Changement des années pas encore fait

      $year=date('Y', strtotime($week[0])); //On prend l'année du début de la semaine 

      echo $year;
    }
   */


   //On modifie les dates par rapport à la date du lundi

    $lundiLite=date_format($date, 'd/m'); //Date du lundi sous la forme d/m
    $lundi=date_format($date, 'Y-m-d');//Date sous forme complète et utilisable, utilisée au prochain clic des changements de semaine. Fonctionne !

    date_modify($date, '+1 day');
    $mardiLite=date_format($date, 'd/m');
    $mardi=date_format($date, 'Y-m-d');

    date_modify($date, '+2 day');
    $mercrediLite=date_format($date, 'd/m');
    $mercredi=date_format($date, 'Y-m-d');

    date_modify($date, '+3 day');
    $jeudiLite=date_format($date, 'd/m');
    $jeudi=date_format($date, 'Y-m-d');

    date_modify($date, '+4 day');
    $vendrediLite=date_format($date, 'd/m');
    $vendredi=date_format($date, 'Y-m-d');

    date_modify($date, '+5 day');
    $samediLite=date_format($date, 'd/m');
    $samedi=date_format($date, 'Y-m-d');

    date_modify($date, '+6 day');
    $dimancheLite=date_format($date, 'd/m');
    $dimanche=date_format($date, 'Y-m-d');

?>

  <li id="day0"><?=$lundiLite?></li>
  <li id="day0Complete" class="hidden"><?=$lundi?></li>

  <li id="day1"><?=$mardiLite?></li>
  <li id="day1Complete" class="hidden"><?=$mardi?></li>

  <li id="day2"><?=$mercrediLite?></li>
  <li id="day2Complete" class="hidden"><?=$mercredi?></li>

  <li id="day3"><?=$jeudiLite?></li>
  <li id="day3Complete" class="hidden"><?=$jeudi?></li>

  <li id="day4"><?=$vendrediLite?></li>
  <li id="day5Complete" class="hidden"><?=$vendrediLite?></li>

  <li id="day5"><?=$samediLite?></li>
  <li id="day6Complete" class="hidden"><?=$samediLite?></li>

  <li id="day6"><?=$dimancheLite?></li>
  <li id="day+Complete" class="hidden"><?=$dimancheLite?></li>

<?php
    exit;
}




//Pour l'affichage du 1er chargement :

$week=array();//Contiendra les dates des jours de la semaine en cours, du lundi au dimanche. 
//Format standard Y-m-d (apparemment obligatoire pour faire ensuite des opérations sur les dates)

$weekLite=array(); //Contiendra les dates, en format simplifié day/month. Utilisé pour l'affichage


    $monday = strtotime('monday this week');
    foreach (range(0, 6) as $day) {
        $week[$day] = date("Y-m-d", (($day * 86400) + $monday));
        $weekLite[$day]=date('d/m', strtotime($week[$day]));
    }
    $year=date("Y", ($monday));

    $daysOfTheWeek = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche')


?>
<section>
    <h2 class="titleCenter">Semaine du <label id="annee"><?=$year?></label> </h2>

    <div class="calendar">
        <div class="header">
            <ul class="weekDays">
                <?php
                    # Génére une liste des jours de la semaine
                    foreach ($daysOfTheWeek as $day)
                        echo '<li>' . $day . '</li>'
                ?>
            </ul>

            <ul id="dayNumbers-container" class="dayNumbers-container">  <!--Actuellement la classe n'est pas utilisée dans le CSS. Les IDs servent pour l'Ajax. 
            Les ...Complete servent à transmettre à l'Ajax la date sous le format permettant la manipulation, mais pas joli à afficher à l'utilisateur (2021-06-25)-->


                <li id="day0"><?=$weekLite[0]?></li>
                <li id="day0Complete" class="hidden"><?=$week[0]?></li>

                <li id="day1"><?=$weekLite[1]?></li>
                <li id="day1Complete" class="hidden"><?=$week[1]?></li>

                <li id="day2"><?=$weekLite[2]?></li>
                <li id="day2Complete" class="hidden"><?=$week[2]?></li>

                <li id="day3"><?=$weekLite[3]?></li>
                <li id="day3Complete" class="hidden"><?=$week[3]?></li>

                <li id="day4"><?=$weekLite[4]?></li>
                <li id="day5Complete" class="hidden"><?=$week[4]?></li>

                <li id="day5"><?=$weekLite[5]?></li>
                <li id="day6Complete" class="hidden"><?=$week[5]?></li>

                <li id="day6"><?=$weekLite[6]?></li>
                <li id="day+Complete" class="hidden"><?=$week[6]?></li>

            </ul>

        </div>
<br><br>
        <div class="timeslots-containers">
            <ul class="timeslots">
                <?php
                    # Génére les créneaux horaires
                    for ($i = 0; $i < 24; $i++)
                        echo '<li>' . (6 + $i) % 24 . 'h </li>'
                ?>
            </ul>
        </div>

        <div class="event-container"> <!--Non fonctionnel-->
            
            <div class="slot">
                <div class="event-status"></div>
                <span>Event A</span>
            </div>
        
        
        </div>
    </div>
</section>

