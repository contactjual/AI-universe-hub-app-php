<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Univers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
</head>

<body class="" id="block-me">
    <header>
        <h1>AI Univers Hub</h1>
    </header>
    <main class="container">
        <div  id="block-all">
            <button>Short By Data</button>
            <section class="all-cards" id="card-section">


                <!-- add card dynamicaly -->


            </section>  
            <button>See More</button>
        </div>



        <!-- popup dynamicaly -->
         
        <section class="over-area" id="over-pop">
            
        </section>

    </main>
    <footer class="web-last">
        <div class="icons">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin"></i>
            <i class="fa-brands fa-square-instagram"></i>
        </div>
        <small>Copyright 1999-2024 by Refsnes Data. All Rights Reserved.</small>
    </footer>

</body>

</html>


<?php

// fetch data 

$text_file = "api_data.text";

if (file_exists( $text_file ) ) {
    $data = file_get_contents( $text_file );
    $object = json_decode( $data);
    $object_data = $object->data;
    $array_data = $object_data->tools;

    // print_r($object_data->tools[01]->id);
    // $description = ($object_data->data->tools[0]->description);
    // echo $description;

    // var_dump( $object_data);
    var_dump( $array_data);

    $features = $array_data[0]->features;

    foreach ($features as $key) {
        echo "$key <br>";
    }

} else {
    $mess = "data not found";
}





?>