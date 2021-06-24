
//Version PHP/Ajax :

function changeWeek(type){ //Ajax. type=next ou previous ou today. la var currDate symbolise la date actuellement simulée (change quand on avance ou recule de semaines)
//Pas trouvé de moyen de changer plusieurs zones en une seule requete Ajax

 
    for (var i = 0; i <=6; i++) {
        
        AJAX('day'+i, type, i); 
    }


    AJAX("annee", "year", 0);

//C'est le moyen le plus simple que j'ai trouvé pour changer plusieurs endroits d'un coup avec Ajax
}

function AJAX(ID, type, i){

    if (type!="previous" && type!="next" && type!="today" && type!="year") { //Si demande invalide
        return;
    } else {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) { //Si la requete est prete, on fait : 
            
          document.getElementById(ID).innerHTML = this.responseText;
         
        }
    };


    xmlhttp.open("POST","calendarWeeks.php",true); //Change la semaine et charge les parties qui y sont prévues
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("ID="+ID+"&type="+type+"&Request=changeWeeks"+"&index="+i);
    }

}























//Version full JavaScript :
let globalCurrDate = new Date; //var globale représentant la date actuellement simulée (change lorsqu'on avance/recule les semaines)


 /*

function currentWeek(){ //Se charge au lancement de la page, ou lorsqu'on clique sur "aujourd'hui".

    var tmpCurr = new Date;
    datesFullWeek(tmpCurr);
    globalCurrDate = new Date;
}



function nextWeek(){ //Affiche la semaine suivante à la date actuelle

//Attention globalCurrDate=nextWeekDay pose des problemes car copie d'objets. Changer l'un plus tard changera aussi l'autre
//Optimisable en faisant une copie profonde entre globalCurrDate et nextWeekDay


    var nextWeekDay = new Date(globalCurrDate.getFullYear(), globalCurrDate.getMonth(), globalCurrDate.getDate()+7);
    globalCurrDate=new Date(globalCurrDate.getFullYear(), globalCurrDate.getMonth(), globalCurrDate.getDate()+7);
    datesFullWeek(nextWeekDay);
}



function previousWeek(){ //Affiche la semaine précédente à la date actuelle


    var previousWeekDay = new Date(globalCurrDate.getFullYear(), globalCurrDate.getMonth(), globalCurrDate.getDate()-7);
    globalCurrDate=new Date(globalCurrDate.getFullYear(), globalCurrDate.getMonth(), globalCurrDate.getDate()-7);
    datesFullWeek(previousWeekDay);
}





function datesFullWeek(curr){ //Affiche toute la semaine (avec les bonnes dates) correspondant à la date qu'on lui donne

    
    var lundi = curr.getDate() - curr.getDay()+1; //Par défaut Dimanche=0 et Lundi=1, d'où le +1
   
    //On passe par curr.setDate pour que ça detecte automatiquement les changements de mois et leur nombre de jours
    curr.setDate(lundi);
    var monthLundi=curr.getMonth()+1;
    var dateLundi=curr.getDate()+"/"+monthLundi;

    //Prend à chaque fois le jour suivant, et detecte si on est en fin de mois
    curr.setDate(curr.getDate()+1);
    var monthMardi=curr.getMonth()+1;//+1 car les mois vont de 0 à 11
    var dateMardi=curr.getDate()+"/"+monthMardi;

    curr.setDate(curr.getDate()+1);
    var monthMercredi=curr.getMonth()+1;
    var dateMercredi=curr.getDate()+"/"+monthMercredi;

    curr.setDate(curr.getDate()+1);
    var monthJeudi=curr.getMonth()+1;
    var dateJeudi=curr.getDate()+"/"+monthJeudi;

    curr.setDate(curr.getDate()+1);
    var monthVendredi=curr.getMonth()+1;
    var dateVendredi=curr.getDate()+"/"+monthVendredi;

    curr.setDate(curr.getDate()+1);
    var monthSamedi=curr.getMonth()+1;
    var dateSamedi=curr.getDate()+"/"+monthSamedi;

    curr.setDate(curr.getDate()+1);
    var monthDimanche=curr.getMonth()+1;
    var dateDimanche=curr.getDate()+"/"+monthDimanche;


    document.getElementById("day1").innerHTML = dateLundi;
    document.getElementById("day2").innerHTML = dateMardi;
    document.getElementById("day3").innerHTML = dateMercredi;
    document.getElementById("day4").innerHTML = dateJeudi;
    document.getElementById("day5").innerHTML = dateVendredi;
    document.getElementById("day6").innerHTML = dateSamedi;
    document.getElementById("day7").innerHTML = dateDimanche;

    document.getElementById("annee").innerHTML = curr.getFullYear();
}
*/
