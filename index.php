
<?php
    $hotels = [

    [
        'name'               => 'Hotel Belvedere',
        'description'        => 'Hotel Belvedere Descrizione',
        'parking'            => true,
        'vote'               => 4,
        'distance_to_center' => 10.4,
    ],
    [
        'name'               => 'Hotel Futuro',
        'description'        => 'Hotel Futuro Descrizione',
        'parking'            => true,
        'vote'               => 2,
        'distance_to_center' => 2,
    ],
    [
        'name'               => 'Hotel Rivamare',
        'description'        => 'Hotel Rivamare Descrizione',
        'parking'            => false,
        'vote'               => 1,
        'distance_to_center' => 1,
    ],
    [
        'name'               => 'Hotel Bellavista',
        'description'        => 'Hotel Bellavista Descrizione',
        'parking'            => false,
        'vote'               => 5,
        'distance_to_center' => 5.5,
    ],
    [
        'name'               => 'Hotel Milano',
        'description'        => 'Hotel Milano Descrizione',
        'parking'            => true,
        'vote'               => 2,
        'distance_to_center' => 50,
    ],

    ];
?>
<?php
    $parkingIs = false;
    if (isset($_GET['parking']) && $_GET['parking'] == 'on') {
    $parkingIs = true;
    }
    var_dump($parkingIs);
    ?>
    
    <?php
// controllo ricerca per stelle
$min_star= 0;
      if (isset($_GET['star'])  && $_GET['star'] < 5) {
    $min_star = $_GET['star'];
    };
    var_dump($min_star);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>I nostri Hotel</h1>
    <form action="">
        <div class='d-flex'>
            <div class="form-control">
                <input class="form-check-input" id ="parking" name="parking" type="checkbox">
                <label class="form-check-label" for="parking">Presenza parcheggio</label>
            </div>

            <div class=" ms-3 form-control">
                <input type="number" min= "0" max= "5" id="star" name="star">
                <label for="star">Stelle</label>
            </div>
        </div>
        <button class="btn btn-dark">invia</button>
    </form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">description</th>
            <th scope="col">parking</th>
            <th scope="col">vote</th>
            <th scope="col">distance_to_center</th>
        </tr>
    </thead>
       <tBody>
    <?php

        foreach ($hotels as $hotel) {
            if ($parkingIs === true && $hotel["parking"] === false) {
                continue;
            }
            if ($hotel['vote'] < $min_star){
                continue;
            };
            echo "<tr>";
            foreach ($hotel as $key => $value) {

                if ($key == 'parking' && $value == true) {
                    echo '<td>yes</td>';
                } else if ($key == 'parking' && $value == false) {
                    echo '<td>no</td>';
                } else {

                    echo "<td>$value </td>";
                }

            }

            echo "</tr>";

        }

    ?>
   </tBody>
</table>
    </body>
</html>