<!DOCTYPE html>
<html>
<head>
    <title>Covoiturage - Trajet</title>
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDJs_wHyGvTeo8k5PbwzNdNyYs4cBAplE&libraries=places,geometry"></script>
</head>
<body>
    <header>
        <h3 class="title">My Little Poney - Covoiturage</h3>
        <nav>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./exp.html">Expériences</a></li>
                <li><a href="./" title="Voir le calendrier des prochaines matches">Matches</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="main" id="top">
        <div id="left-panel">
            <div class="top-content">
                <h4>Itinéraire</h4>
                <p class="subInfo">
                    <form class="subInfo" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="cityInputDepart">Entrez votre lieu de départ :</label>
                    <input type="text" id="cityInputDepart" name="depart">
                    <br>
                    <label for="cityInputArrivee">Entrez votre lieu d'arrivée :</label>
                    <input type="text" id="cityInputArrivee" name="arrivee">
                    <br>
                    <label for="voiture">Nombre de personnes que votre voiture peut prendre :</label>
                    <input type="number" id="voiture" name="voiture">
                    <br>
                    <label for="heureDepart">Heure de départ :</label>
                    <input type="time" id="heureDepart" name="heureDepart">
                    <br>
                    <button class="next-button" type="submit">Ok</button>
                    </form>
                </p>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Récupérer les valeurs envoyées par le formulaire
                    $depart = $_POST['depart'];
                    $arrivee = $_POST['arrivee'];

                    // Récupération pour l'api
                }
                ?>
                <div class="subInfo">
                    <p>Lieu de départ : <?php echo "$depart";?></p>
                    <p>Lieu d'arrivé : <?php echo "$arrivee";?> </p>
                </div>
            </div>
        </div>
        <div id="right-panel">
            <!-- Affichage de l'itinéraire sur le côté droit -->
            <?php
            echo '<div id="map"></div>';
            echo '<script>
                    function initMap() {
                        var directionsService = new google.maps.DirectionsService();
                        var directionsRenderer = new google.maps.DirectionsRenderer();
                        var map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 8,
                            center: { lat: 48.8566, lng: 2.3522 } // Coordonnées de Paris par défaut
                        });
                    directionsRenderer.setMap(map);
                    var request = {
                        origin: "'.$depart.'",
                        destination: "'.$arrivee.'",
                        travelMode: "DRIVING"
                    };
                    directionsService.route(request, function(result, status) {
                        if (status == "OK") {
                            directionsRenderer.setDirections(result);
                        }
                    });
                }
                initMap();
                </script>';
            ?>
        </div>
    </div>
</body>
</html>
