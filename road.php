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
                // Vérification si le formulaire a été soumis
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Récupération des valeurs du formulaire
                    $depart = $_POST['depart'];
                    $arrivee = $_POST['arrivee'];
                    $voiture = $_POST['voiture'];
                    $heureDepart = $_POST['heureDepart'];

                    // Connexion à la base de données
                    $serveur = "mysql_serv"; // Changez cela si votre base de données est hébergée ailleurs
                    $utilisateur = "dletalle"; // Remplacez par votre nom d'utilisateur de la base de données
                    $motDePasse = "dletalle-rt2023!"; // Remplacez par votre mot de passe de la base de données
                    $baseDeDonnees = "dletalle";

                    // Connexion à la base de données MySQL
                    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

                    // Vérification de la connexion
                    if ($connexion->connect_error) {
                        die("La connexion a échoué : " . $connexion->connect_error);
                    }

                    // Requête d'insertion des données dans la table de la base de données
                    // Ajout dans la table à adapter aux prochaines requetes. Exemple ci-dessous pour une table Depart et Arrivee
                    $requete = "INSERT INTO Depart (idHdepart, Lieu, horaire-, horaire+) VALUES ('$depart', '$arrivee', '$voiture', '$heureDepart')";
                    $requeteb = "INSERT INTO Arrivee (idHarrivee, Lieu, horaire-, horaire+) VALUES ('$depart', '$arrivee', '$voiture', '$heureDepart')";
                    
                    
                    // Exécution de la requête
                    if ($connexion->query($requete) === TRUE) {
                        echo "Les données ont été ajoutées avec succès.";
                    } else {
                        echo "Erreur lors de l'ajout des données : " . $connexion->error;
                    }

                    // Fermeture de la connexion à la base de données
                    $connexion->close();
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
