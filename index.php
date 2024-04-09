<!DOCTYPE html>
<html>
<head>
    <title>Covoiturage</title>
    <link rel="stylesheet" href="./style/style.css">
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
        
</style>
</head>
<body>
    <header>
        <h3 class="title">My Little Poney - Covoiturage</h3>
        <nav>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
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
                    <a class="subInfo" title="Accéder a la création d'itinéraire" href="./road.php">Sélectionner une destination</a>
                </p>
                <div class="content">

                </div>
            </div>
        </div>


        <div id="right-panel">
            <div id="map"></div>
        </div>
    </div>
</body>
</html>
