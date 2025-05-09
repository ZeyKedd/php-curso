<?php

const API_URL = 'https://whenisthenextmcufilm.com/api';

#Inicializar una nueva sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL);

#indicamos a php que solo quermos recibir el resultado de la peticion y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* Ejecutar la peticion y guardar resultados */
$resultado = curl_exec($ch);

$data = json_decode($resultado, true); //El true es decirle que lo deje en un array asociativo
curl_close($ch); //cerrar la sesion de cURL

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel Peliculas</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <!--ver resultado de la peticion -->

    <!-- <pre style="font-size: 10px; overflow: scroll; height: 250px;">
    <?php var_dump($data); ?> 
    </pre> -->

    <h2>La proxima pelicula de Marvel :D</h2>
    <section>
        <img src="<?= $data["poster_url"]; ?>" alt="<?= $data["title"]; ?>" style=" width : 300px; border-radius: 16px;" />
    </section>
    <hgroup>
        <h2><?= $data["title"];?> se estena en <?= $data["days_until"] ?> dias</h2>
        <p> Fecha de estreno: <?= $data["release_date"] ?></p>
        <!-- se hace lo del [][] doble array porque la informacion de la siguiente pelicula esta andidad dentro de otro array llamado following_production -->
        <p> Siguiente Pelicula <?= $data["following_production"]["title"] ?> </p>
        <p> Se estrena el: <?= $data["following_production"]["release_date"] ?> </p>

    </hgroup>
</main>



<style>
    :root {
        color-scheme: light dark;
    }

    h2{
        text-align: center;
    }
    
    section {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    hgroup {
        text-align: center;

    }

    img {
    margin: 0 auto;
    }

    body {
        display: grid;
        place-content: center;
    }

    </style>