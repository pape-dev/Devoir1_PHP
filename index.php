<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP : Devoir 1</title>

    <!--
    -- -----------------------------------------------------Un peu de CSS------------------------------------------------------------------ 
-->
    <style>
        h1 {
            display: flex;
            justify-content: center;
            border-bottom: 1px solid rgb(119, 130, 140);
            padding-bottom: 10px;
            font-family: 'Roboto', sans-serif;
        }

        label {
            padding-bottom: 5px;
        }

        input {
            height: 30px;
            border: 1px solid burlywood;
            border-radius: 5px;
            padding-left: 30px;
            padding-right: 30px;
            outline: 1px solid burlywood;
        }

        input[type=submit] {
            background-color: #0c0c0c;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;

        }

        input[type=submit]:hover {
            background-color: white;
            color: burlywood;
            border: 1px solid #121312;
        }

        form {
            padding-left: 300px;
        }

        table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
            border: 3px solid rgb(128, 82, 128);
        }

        th,
        td {
            padding: 20px;
            font-family: 'Times New Roman', Times, serif, cursive;
        }

        th {
            letter-spacing: 2px;
            text-align: center;
            font-weight: bolder;
            font-size: 20px;
            color: rgb(85, 15, 15);
        }

        td {
            letter-spacing: 1px;
            text-align: center;
            font-weight: bolder;
            font-size: 20px;
            color: rgb(213, 6, 6);
        }

        th,
        td {
            background: linear-gradient(to bottom, rgba(232, 222, 222, 0.943), rgba(242, 229, 229, 0.5));
            border: 3px solid rgb(19, 19, 19);
        }

        tr:nth-child(odd) {
            background-color: #e4d8e1;
        }

        tr:nth-child(even) {
            background-color: #fff5f5;
        }


        table {
            background-color: #ff33cc;
        }
    </style>
</head>

<!--
    -- -----------------------------------------------------Le formulaire------------------------------------------------------------------ 
-->

<body>
    <!--Titre du formulaire plus une petite description-->
    <h1>Recherche trajet</h1>
    <p>Veuillez remplir ce formulaire pour rechercher un trajet selon la ville choisie</p>

    <!--Le formulaire de recherche trajet-->
    <form action="" method="post">

        <!--demande nom-->
        <label for="nom">Votre Nom</label>
        <input type="text" name="nom" id="nom"> <br> <br>

        <!--demande prenom-->
        <label for="prenom">Votre prénom</label>
        <input type="text" name="prenom" id="prenom"> <br> <br>

        <!--demande email-->
        <label for="email">Votre Email</label>
        <input type="text" name="email" id="email"> <br> <br>

        <!--demande telephone-->
        <label for="numero">Téléphone</label>
        <input type="tel" name="numero" id="numero"> <br> <br>

        <!--choix ville-->
        <label for="ville">Veuillez choisir une ville </label><br />
        <select name="choix" id="ville">
            <option value="">Selectionner une ville</option>
            <option value="Paris">Paris</option>
            <option value="Orléans">Orléans</option>
            <option value="Dublin">Dublin</option>
            <option value="Nice">Nice</option>
            <option value="Tours">Tours</option>
        </select>
        <br> <br>

        <!--bouton rechercher-->
        <input classe="bouton" type="submit" name="rechercher" id="rechercher">
    </form>
    <br> <br>
</body>

<!--
    -- -----------------------------------------------------Le code PHP------------------------------------------------------------------ 
-->
<?php

//Vérifier si certains champs existent
if (isset($_POST['rechercher'])) {

    //Vérifier si tous les champs sont bien remplis
    if ((empty($_POST['nom']))
        or
        (empty($_POST['prenom']))
        or
        (empty($_POST['email']))
        or
        (empty($_POST['numero']))
        or
        ((empty($_POST['choix'])))
    ) {
        echo 'Désolé !!! Tous les champs doivent être remplis';
    } else {

        //Tableau liste des voyages possibles
        $travels = [
            ['departure' => 'Paris', 'arrival' => 'Nantes', 'departureTime' => '11:00', 'arrivalTime' => '12:34', 'driver' => 'Thomas'],
            ['departure' => 'Orléans', 'arrival' => 'Nantes', 'departureTime' => '05:15', 'arrivalTime' => '09:32', 'driver' => 'Mathieu'],
            ['departure' => 'Dublin', 'arrival' => 'Tours', 'departureTime' => '07:23', 'arrivalTime' => '08:50', 'driver' => 'Nathanaël'],
            ['departure' => 'Paris', 'arrival' => 'Orléans', 'departureTime' => '03:00', 'arrivalTime' => '05:26', 'driver' => 'Clément'],
            ['departure' => 'Paris', 'arrival' => 'Nice', 'departureTime' => '10:00', 'arrivalTime' => '12:09', 'driver' => 'Audrey'],
            ['departure' => 'Nice', 'arrival' => 'Nantes', 'departureTime' => '10:40', 'arrivalTime' => '13:00', 'driver' => 'Pollux'],
            ['departure' => 'Nice', 'arrival' => 'Tours', 'departureTime' => '11:00', 'arrivalTime' => '16:10', 'driver' => 'Endouard'],
            ['departure' => 'Tours', 'arrival' => 'Amboise', 'departureTime' => '16:00', 'arrivalTime' => '18h:40', 'driver' => 'Priscilla'],
            ['departure' => 'Nice', 'arrival' => 'Nantes', 'departureTime' => '12:00', 'arrivalTime' => '16:00', 'driver' => 'Charlotte']
        ];
        // Condition pour afficher les destinations correspondantes à la ville  de départ choisie par l'utilisateur
        if (($_POST['choix'] == 'Paris') or ($_POST['choix'] == 'Orléans') or ($_POST['choix'] == 'Dublin') or ($_POST['choix'] == 'Nice')
            or ($_POST['choix'] == 'Tours')
        ) {

            //Ajout un Titre h1
            echo '<h1>Liste des trajets disponibles</h1>';

            //Tableau des des correspondances
            echo '<table>';
            echo '<tr>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Heure de départ</th>
                    <th>Heure d\'arrivée</th>
                    <th>Conducteur</th>
                </tr>';

            //Boucle foreach pour récupérer les informations d'un tableau selon la ville choisie par l'utilisateur
            foreach ($travels as $travel) {
                if ($travel['departure'] == $_POST['choix']) {

                    echo '<tr>';
                    echo '<td>' . $travel['departure'] . '</td>';
                    echo '<td>' . $travel['arrival'] . '</td>';
                    echo '<td>' . $travel['departureTime'] . '</td>';
                    echo '<td>' . $travel['arrivalTime'] . '</td>';
                    echo '<td>' . $travel['driver'] . '</td>';
                    echo '</tr>';
                }
            }

            echo '</table>';
        }
    }
}
?>

</html>