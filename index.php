<!DOCTYPE html>
<html>
<head>
    <title>Covoiturage</title>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {lat: 48.8566, lng: 2.3522} // Coordonnées de Paris par défaut
            });

            // Fonction pour géocoder une adresse
            function geocodeAddress(geocoder, map) {
                var address = document.getElementById('cityInput').value; // Récupère la valeur du champ de saisie

                geocoder.geocode({'address': address}, function(results, status) {
                    if (status === 'OK') {
                        map.setCenter(results[0].geometry.location); // Centre la carte sur les coordonnées de l'adresse
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }

            // Création d'un objet Geocoder
            var geocoder = new google.maps.Geocoder();

            // Écouteur d'événement pour le bouton
            document.getElementById('submitBtn').addEventListener('click', function() {
                geocodeAddress(geocoder, map); // Appelle la fonction de géocodage lorsque le bouton est cliqué
            });
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?&callback=initMap">
    </script>
    <style>
        /* Assurez-vous de définir une taille pour la carte */
        /* CSS FILE, By Antonin Michon; BUT R&T */

        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;600&display=swap');  /*Imports des polices google font*/
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap');

        :root { /*Variables CSS*/
            --police: 'Raleway', sans-serif;
            --police2: 'Playfair Display', serif;
            --vert : #175732;
        }

        html {                                    /*CONTENU DU SITE*/
        scroll-behavior: smooth;                /*Défflement fluide*/
        }

        body {                                    /*CONTENU DE LA PAGE*/
        background-color: black;              /*Couleur de fond*/
        font-family: var(--police);             /*Police sur tout le site*/
        color: white;                         /*Couleur du texte*/
        margin: 0;                              /*Enleve l'espace entre le contenu et le bord*/
        padding: 0;                             /*Enleve l'espace entre le contenu et sa boite*/
        }

        header {                                  /*BARRE DE MENU*/
        position: fixed;                        /*Non soumise au défilement*/
        display: flex;                          /*Module de mise en page*/
        align-items: center;                    /*Aligne les élement sur la hauteur*/
        justify-content: space-between;         /*Espace les élements*/
        top: 0;                                 /*Colle l'élement sur le haut de la page*/
        left: 0;                                /*Colle l'élement sur la gauche de la page*/
        width: 100%;                            /*Prend toute la largeur de l'écran*/
        height: 6%;                             /*Prend 6% de la hauteur de l'écran*/
        color: black;                         /*Couleur du texte*/    
        background-color: #FFF8E1;            /*Couleur de fond*/
        padding: 10px 20px;                     /*Espacement du texte par rapport au bord*/
        z-index: 998;                           /*Mettre l'élement en premier plan*/
        }
        .title {                                  /*TEXTE BARRE MENU*/
        line-height: 100%;                      /*Ligne prend toute la hauteur (centre)*/
        font-size: 30px;                        /*Taille du texte*/
        text-align: center;                     /*Aligne sur la hauteur*/
        }
        header h3 {
        margin: 0;                              /*Enleve espacement*/
        }
        header nav {
        margin-right: 7%;                       /*Espace de 7% le menu du bord*/
        }
        header nav ul {
        list-style: none;                       /*Enleve les points de la liste*/
        word-spacing: 10px;                     /*Espace les mots*/
        }
        header ul li {
        display: inline;                        /*Met la liste en ligne*/
        }
        header li a {
        text-shadow: 15px 2px 4px rgba(0, 0, 0, 0.5); /*Ombre sous texte*/
        position: static;                       /*Pas de mouvement*/
        font-size: 30px;                        /*Taille texte*/
        color: black;
        text-decoration: none;                  /*Retire soulignement*/
        transition: text-shadow 0.15s ease-in-out;  /*Temps et paramètre de transition*/
        }
        header li a:hover {                       /*Quand la souris passe au dessus*/
        text-decoration: underline;                 
        text-shadow: 15px -20px 0px rgba(23, 87, 50, 0.8);  /*Changement ombre*/
        }


        .main {
        display: grid;                          /*Module affichage*/
        grid-template-columns: repeat(2, 1fr);  /*Définition colone*/
        grid-template-rows: 1fr;                /*Définition ligne*/
        grid-column-gap: 0px;                   /*Espacement*/
        grid-row-gap: 0px;
        height: 100vh;                          /*toute la page*/
        }


        /*
        * Paramètre majoritairement similaire inutile a commenter ligne par ligne et trop long, me contacter en cas de question à
        * antonin.michon@edu.univ-fcomte.fr
        */

        /* PAGE DE GAUCHE */
        #left-panel {
        grid-area: 1 / 1 / 2 / 2; /*Paramère grille csss grid*/
        background-color: #232323;
        height: 100%;
        box-shadow: 5px 0px 0px rgba(0, 0, 0, 0.5);
        }


        .top-content {
        color: white;
        margin-top: 10%;
        margin: 0 auto;
        text-align: center;
        font-size: 100px;
        width: 50%;
        }

        h4 {
        font-family: var(--police2);
        text-align: start;
        }

        .subInfo {
        color: white;
        font-size: 30px;
        line-height: 1.5;
        text-align: left;
        text-decoration-color: var(--vert);     /*Appelle variable*/
        }

        .next-button {          /*Propriété du bouton*/
        position: fixed;
        left: 20%;
        bottom: 10%;
        z-index: 999;
        height: 50px;
        width: 200px;
        cursor: pointer;
        font-size: 20px;
        border-radius: 30px;
        border: none;
        color: rgba(255, 255, 255, 0.3);
        background-color: rgba(23, 87, 50, 0.3);
        transition: all 0.1s ease-in-out;
        }

        .next-button:hover {
        color: rgba(255, 255, 255, 1);
        background-color: rgba(23, 87, 50, 1);
        }

        .hidden {
        display: none;
        }

        .content p, ul, li, a {
        text-align: left;
        color: white;
        font-size: 30px;
        }

        .title-paragraph {
        font-weight: normal;
        margin-top: 50vh;
        text-align: left;
        font-style: italic;
        }

        .top-button {
        position: fixed;
        left: 45%;
        bottom: 10%;
        z-index: 999;
        height: 50px;
        width: 50px;
        cursor: pointer;        /*Style curseur*/
        font-size: 20px;
        border-radius: 30px;
        border: none;
        color: white;
        background-color: var(--vert);
        transition: all 0.1s ease-in-out;
        }


        /*==================================================================*/

        /* PAGE DE DROITE*/
        #right-panel {
        grid-area: 1 / 2 / 2 / 2;
        background-color: black;
        height: 100%;
        }
        
        #map {
            height: 100%;
            width: 100%;
        }

        table {
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-size: 50px;
        border-spacing: 10px;
        }

        table td a{
        color: white;
        }

        #pngPhone, #pngMail {
        height: 80px;
        float: right  ;

        }

        .menu .sub-menu {
        display: none;
        }

        .menu:hover .sub-menu {
        display: block;

        @media screen and (max-width: 768px) {
            /* Styles pour les écrans de taille maximale de 768px (téléphones) */
            .main {
                grid-template-columns: 1fr; /* Une seule colonne pour les téléphones */
            }
            #left-panel, #right-panel {
                width: 100%; /* Pleine largeur pour les téléphones */
            }
            header {
                height: auto; /* Hauteur automatique pour le logo et le menu pour les téléphones */
                padding: 10px 0; /* Espacement pour les téléphones */
            }
            .title {
                font-size: 24px; /* Taille de la police réduite pour les téléphones */
            }
    }
</style>
</head>
<body>
    <header>
        <h3 class="title">My Little Poney - Covoiturage</h3>
        <nav>
            <ul>
                <li><a href="./index.html">Accueil</a></li>
                <li><a href="./exp.html">Expériences</a></li>
                <li><a href="./about.html" title="I introduce myself in a short video">About</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="main" id="top">

        <div id="left-panel">
            <div class="top-content">
                <h4>Voyager<br>...Facilement</h4>
                <p class="subInfo">
                    Plateforme de covoiturage<br>
                    Réservé aux étudiants !<br>
                    <a class="subInfo" title="Ouvir le site de la DIRISI" href="" target="_blank">Sélectionner une destination</a>
                </p>
                <div class="content">

                </div>
                <div>
        <label for="cityInput">Entrez votre ville :</label>
        <input type="text" id="cityInput">
        <button id="submitBtn">Afficher sur la carte</button>
    </div>
            </div>
        </div>


        <div id="right-panel">
            <div id="map"></div>
        </div>
    </div>
</body>
</html>
