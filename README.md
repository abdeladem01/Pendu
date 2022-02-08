# PROJET JEU DU PENDU WEB - v.2021
## Projet Applications du WEB (pHp , JavaScript , AJAX ...)
###### réalisé par Fattah Abdeladem Saoud & Boubia Marouane en juin 2021

### Principe de base du jeu du pendu:
La machine choisi un mot au hasard et le joueur doit le deviner dans un temps imparti.
A chaque coup, le joueur propose une lettre. Si cette lettre est dans le mot au moins une fois, elle est affichée à son ou ses emplacements corrects dans le mot, sinon le programme fait apparaître un élément supplémentaire du pendu. 
Si le joueur arrive à proposer toutes les lettres qui constituent le mot (donc, devine le mot) avant que le pendu soit constitué et avant la fin du temps imparti, il gagne. 
Dès que le pendu est constitué ou que le temps est écoulé la partie est perdue.

### Points essentiels du projet :
Nous avons implémenté :
*  Une page d'accueil
*  Gestion du mot à deviner :  le mot à deviner n'est pas présent dans le HTML et n'est pas généré par le script JS mais bien par une requête AJAX à un script PHP
*  Proposition de lettres : géré uniquement par des requêtes AJAX vers des scripts PHP et non par un script JS
*  Constitution du pendu progressive
*  Gestion d'une partie en cours et remplacement par les bonnes lettres
*  Gestion de fin de partie (succès/échec), Rejouer ou quitter et afficher les 3 meilleurs joueurs.
*  Gestion du temps (avec un temps limité)
*  Authentification et création de compte

### Quel version avons nous effectué:
Nous avons choisi de faire la version final (Version 3) en implémentant tou ce qui est demandé dans le sujet (voir PDF Sujet).

###### Group : Abdeladem Saoud Fattah | Marouane Boubia
###### Encadré par M. Cyrille Mascart (mascart@i3s.unice.fr) 
###### Note finale : 17.5/20 | Moyenne de promo : 13.19/20