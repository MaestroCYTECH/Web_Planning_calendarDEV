<?php

$today=date('d/m');

echo $today;


$week = [];
$monday = strtotime('monday this week');
foreach (range(0, 6) as $day) {
    $week[] = date("d/m/Y", (($day * 86400) + $monday));
}

var_dump($week);

?>


<!DOCTYPE html>
    <html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Le calendrier</title>
        <link rel="stylesheet" href="css/styleCalendar.css">

        <!-- <link rel="stylesheet" href="css/dark.css"> (Non réutilisable tel quel car change aussi les boutons)
        <link rel="stylesheet" href="css/nouislider.css">
        <link type="text/css" rel="stylesheet" href="css/tail.datetime-default.css">
        <link rel="stylesheet" href="css/tail.datetime-harx-dark.min.css">-->

        <link rel="icon" type="image/png" href="https://cdn.discordapp.com/attachments/457233258661281793/458727800048713728/dae-cmd.png">
        <script type="text/javascript" src="js/scriptDates.js"></script>

    </head>
    <body id="body" onload="currentWeek()"> <!--Quand la page se charge, appeler currentWeek() pour afficher la semaine actuelle-->

        <div class="btn-container">
            <button id="btn_Precedent" onclick="previousWeek()"><--</button>
            <button id="btn_Precedent" onclick="currentWeek()">Aujourd'hui</button>
            <button id="btn_Suivant" onclick="nextWeek()">--></button>
        </div>

        

        <div class="switch-container">
            <button id="btn_Weeks" class="btn_Switch" disabled>Semaine</button>
            <button id="btn_Months" class="btn_Switch">Mois</button>
        </div>


    <br>
        <h2 class="titleCenter">Le calendrier <label id="annee"></label> </h2>
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

                <ul class="dayNumbers">
                    <li id="day1"></li>
                    <li id="day2"></li>
                    <li id="day3"></li>
                    <li id="day4"></li>
                    <li id="day5"></li>
                    <li id="day6"></li>
                    <li id="day7"></li>
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


