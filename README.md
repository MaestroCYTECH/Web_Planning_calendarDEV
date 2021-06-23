# Web_Planning_calendarDEV
Développement de la page calendrier de l'UR

Cahier des charges :

5) fonction calendrier
Affiche un calendrier horizontal par semaine ou par mois, avec les jours en colonnes et les heures en lignes, présentant les parties prévues. 
Doit permettre un affichage lisible dans le cas d'un grand nombre de parties prévues.

a) PageWeb:
- En cliquant sur un synopsis de partie, les descriptions de parties contiendront un lien vers le message (ou canal ?) correspondant sur Discord, posté par le Bot. 
- Si rien n'est prévu un jour, l'affichage ne doit rien afficher. 
- Au contraire, une partie s'étalant sur plusieurs heures doit pouvoir "étirer" le calendrier. 
- Un bouton doit permettre de switch entre un affichage par semaine et par mois.
- Un jour déjà passé dans la semaine doit être grisé, mais les synopsis doivent rester accessibles.
- HTML5/CSS4/PHP
- Faire un affichage responsive
- Par défaut vides, les colonnes se limitent à la largeur du jour de la semaine
- Flèche avant et arrière pour faire défiler les semaines.
- Bouton switch pour passer d'une vue par mois ou par semaine
- Un clic sur une case étend le synopsis (ou l'affiche dans une fenêtre popup) pour avoir plus de détails
- Afficher les parties selon un code couleur

