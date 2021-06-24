<?php


global $week;
$week=array();//Contiendra les dates des jours de la semaine en cours, du lundi au dimanche. 
//Format standard Y-m-d (apparemment obligatoire pour faire ensuite des opérations sur les dates)

global $weekLite;
$weekLite=array(); //Contiendra les dates, en format simplifié day/month. Utilisé pour l'affichage

global $year;

//Probleme des vars globales avec Ajax. Ne marche pas, ne permet d'avancer/reculer qu'une seule fois actuellement


    $monday = strtotime('monday this week');
    foreach (range(0, 6) as $day) {
        $week[$day] = date("Y-m-d", (($day * 86400) + $monday));
        $weekLite[$day]=date('d/m', strtotime($week[$day]));
    }
    $year=date("Y", ($monday));





//Si on vient ici par l'AJAX, pour mettre à jour les semaines : 

if ( isset($_POST['type']) && isset($_POST['ID']) && isset($_POST['index']) && $_POST['Request']=="changeWeeks") { 

    $type=$_POST['type'];
    $ID=$_POST['ID'];
    $i=$_POST['index'];
    

    if($type=="previous"){  
        //Calculer la date 7 jours avant la date actuelle


            $week[$i]=date('Y-m-d', strtotime($week[$i] .' -7 day'));
            $weekLite[$i]=date('d/m', strtotime($week[$i]));
     
            echo $weekLite[$i]; //Remplace la date affichée
    }


    else if($type=="today"){
    
        $monday = strtotime('monday this week');

        $week[$i] = date("Y-m-d", (($i * 86400) + $monday));
        $weekLite[$i]=date('d/m', strtotime($week[$i]));
    
     
        echo $weekLite[$i]; //Remplace la date affichée

    }


    else if($type=="next"){
        
        $week[$i]=date('Y-m-d', strtotime($week[$i] .' +7 day'));
        $weekLite[$i]=date('d/m', strtotime($week[$i]));
     
         echo $weekLite[$i]; //Remplace la date affichée

    }


    else if($type=="year"){

      $year=date('Y', strtotime($week[0])); //On prend l'année du début de la semaine 

      echo $year;
    }
   


    exit;
}

?>


<!DOCTYPE html>
    <html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Le calendrier</title>
        <link rel="stylesheet" href="css/styleCalendar.css">


        <link rel="icon" type="image/png" href="https://cdn.discordapp.com/attachments/457233258661281793/458727800048713728/dae-cmd.png">
        <script type="text/javascript" src="js/scriptDates.js"></script>

    </head>
    <body id="body">

        <div class="btn-container">
            <button id="btn_Precedent" onclick="changeWeek('previous')"><--</button>
            <button id="btn_Today" onclick="changeWeek('today')">Aujourd'hui</button>
            <button id="btn_Suivant" onclick="changeWeek('next')">--></button>
        </div>

        

        <div class="switch-container">
            <button id="btn_Weeks" class="btn_Switch" disabled>Semaine</button>
            <button id="btn_Months" class="btn_Switch">Mois</button>
        </div>


    <br>
        <h2 class="titleCenter">Le calendrier <label id="annee"><?=$year?></label> </h2>
    <br>

        <div class="calendar">
            <div class="header">

                <ul class="weekDays">
                    <li>Lundi</li>
                    <li>Mardi</li>
                    <li>Mercredi</li>
                    <li>Jeudi</li>
                    <li>Vendredi</li>
                    <li>Samedi</li>
                    <li>Dimanche</li>
                </ul>

                <ul class="dayNumbers-container">  <!--Actuellement la classe n'est pas utilisée dans le CSS. Les IDs servent pour l'Ajax-->
                    <li id="day0"><?=$weekLite[0]?></li>
                    <li id="day1"><?=$weekLite[1]?></li>
                    <li id="day2"><?=$weekLite[2]?></li>
                    <li id="day3"><?=$weekLite[3]?></li>
                    <li id="day4"><?=$weekLite[4]?></li>
                    <li id="day5"><?=$weekLite[5]?></li>
                    <li id="day6"><?=$weekLite[6]?></li>
                </ul>

            </div>
<br><br>
            <div class="timeslots-containers">
                <ul class="timeslots">
                    <li>6h</li>
                    <li>7h</li>
                    <li>8h</li>
                    <li>9h</li>
                    <li>10h</li>
                    <li>11h</li>
                    <li>12h</li>
                    <li>13h</li>
                    <li>14h</li>
                    <li>15h</li>
                    <li>16h</li>
                    <li>17h</li>
                    <li>18h</li>
                    <li>19h</li>
                    <li>20h</li>
                    <li>21h</li>
                    <li>22h</li>
                    <li>23h</li>
                    <li>0h</li>
                    <li>1h</li>
                    <li>2h</li>
                    <li>3h</li>
                    <li>4h</li>
                    <li>5h</li>
                </ul>
            </div>

            <div class="event-container"> <!--Non fonctionnel-->
                
                <div class="slot">
                    <div class="event-status"></div>
                    <span>Event A</span>
                </div>
            
            
            </div>
        </div>



    </body>
    </html>

