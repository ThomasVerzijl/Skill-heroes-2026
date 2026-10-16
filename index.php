<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamDestinations</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <?php
    $host = 'host.docker.internal';
    $user = 'root';
    $pass = 'root';
    $db = 'DreamDestinations';


    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Verbinding mislukt: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM destinations ORDER BY number_of_bookings DESC ";
    $result = $conn->query($sql);

    ?>
    <header>
        <img class="logo" src="./assets/logo-dream-destinations.png" alt="logo">
        <a class="nav-item" href="./">Home</a>
        <a class="nav-item" href="#destination-title">Bestemmingen</a>
        <a class="nav-item" href="./aanbiedingen">Aanbiedingen</a>
        <a class="nav-item" href="over ons">Over ons</a>
        <a class="nav-item" href="contact">Contact</a>
    </header>

    <div class="hero">

        <div class="hero-content">
            <h2>Ontdek de wereld met DreamDestinations</h2>
            <h3 id="hero-sub">De mooiste bestemmingen wereldwijd. Voor iedere reiziger de perfecte reis.</h3>
            <a href="#destination-title" id="destination-button">Bekijk bestemmingen</a>

        </div>
        </img>
    </div>
    <h3 id="destination-title">bestemmingen</h2>
        <div class="locations-container">
            <?php
            if ($result && $result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="location-card">
                        <h3 class="country"><?php echo $row['country'] ?></h3>
                        <img src="./assets/destinations/<?php echo $row['image'] ?>" alt="" class=" location-image">
                        <div class="city-bookings-container">
                            <div class="location-city"><?php echo $row['city'] ?></div>
                            <div class="location-bookings"><?php echo $row['number_of_bookings'] ?> boekingen</div>
                        </div>

                    </div>

            <?php
                }
            }
            $conn->close();
            ?>




</body>

</html>