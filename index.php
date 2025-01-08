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
        <div id="block-all">
            <button>Short By Data</button>
            <section class="all-cards" id="card-section">

                <!-- add card dynamicaly -->

                <?php

                // fetch data 
                
                $text_file = "api_data.text";

                if (file_exists($text_file)) {
                    $data = file_get_contents($text_file);
                    $object = json_decode($data);
                    $object_data = $object->data;
                    $array_data = $object_data->tools;

                    // make danamic index number for array_data...............................
                
                    $array_lenght = count($array_data);

                    for ($x = 0; $x < $array_lenght; $x++) {
                        $count_number = $x;
                        $single_index_data = $array_data[$count_number];

                        $ai_name = $single_index_data->name;
                        $features = $single_index_data->features;
                        $links = $single_index_data->links;
                        $img = $single_index_data->image;
                        $published_in = $single_index_data->published_in;
                        $id = $single_index_data->id;

                        // creating card html .................
                
                        echo "<div onclick='openPopup($single_index_data->id)' class='card'>                                    
                                    <div class='features'>
                                        <img src='$img' alt='AI image not found'>
                                        <h2>Features</h2>";

                        // finding features array index .....................
                
                        $features_length = count($features);

                        for ($z = 0; $z < $features_length; $z++) {
                            $features_index = $features[$z];
                            $n = $z + 1;
                            echo "<p>$n. $features_index</p>";

                        }

                        echo "</div>
                                    <hr>
                                    <div class='foot'>
                                        <div class='name-date'>
                                            <h2>$ai_name</h2>
                                            <i class='fa-solid fa-calendar-days'></i>
                                            <span>$published_in</span>
                                        </div>
                                        <i class='fa-solid fa-arrow-right'></i>
                                    </div>
                                </div>";


                        // finding links array index ....................
                
                        // $inner_array_length = count($links);

                        // for ($y = 0; $y < $inner_array_length; $y++) {

                        //     // $link = $links[$y];
                        //     // $name = $link->name;
                        //     // $url = $link->url;
                
                        //     // echo $name;
                
                        //     // echo $url;
                
                        //     // echo "<br>";
                
                        // }
                    }

                } else {
                    $mess = "data not found";
                }

                ?>

            </section>
            <button>See More</button>
        </div>


        <!-- add pop-up_info dynamicaly -->

        <?php

        // // get id number from form post method ... 
        // if (isset($_POST["id_number"]) && !empty($_POST["id_number"])) {
        
        //     $id_number = $_POST["id_number"];
        
        //     echo $id_number;
        
        //     // get api data by searching id ...
        
        //     $url = "https://openapi.programming-hero.com/api/ai/tool/$id_number";
        
        //     if (isset($url)) {
        
        //         $data2 = file_get_contents($url);
        
        //         if ($data2 !== false) {
        //             print_r($data2);
        //             echo "<br>";
        //         }
        
        //     } else {
        //         $mess2 = "Sorry data2 not found";
        //         echo $mess2;
        //     }
        
        // } else {
        //     $mess3 = "Sorry! id number not found";
        //     echo $mess3;
        // }
        
        ?>


        <!-- popup dynamicaly -->
        <section class="over-area" id="over-pop"> </section>



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


    <!-- hidden form................  -->

    <!-- <form id="hidden_form" action="#" method="post">
        <input type="hidden" id="input_value" name="id_number">
    </form> -->



    <!-- manage pop-up (open-close) by javaScript........... -->

    <script>

        // open pop-up...............
        function openPopup(id_number) {
            document.getElementById("over-pop").style.display = "flex";

            // use form ......................................

            // document.getElementById("idForm").addEventListener("submit", function (event) {

            //     event.preventDefault();

            // });

            // add number as input value id number ...
            // document.getElementById("input_value").value = id_number;

            // auto submit form ...
            // document.getElementById("hidden_form").submit();


            // use ajax ..................................        
            // fetch("index.php", {
            //     method: "POST",
            //     headers: {
            //         "Content-Type": "application/x-www-form-urlencoded",
            //     },
            //     body: "id_number=" + id_number,
            // })
            //     .then((response) => response.text())
            //     .then((result) => {
            //         console.log("PHP Response:", result);
            //     })
            //     .catch((error) => console.error("Error:", error));


            // use localStorage ......................
            // localStorage.setItem("id", id_number);
            // console.log(localStorage.getItem("id"));


            // id customize ...
            id_number_customize = (id_number.toString().padStart(2, '0'));

            handlePopup(id_number_customize);

        }

        // featch data for pop-up ...
        const handlePopup = async (id) => {

            const res = await fetch(`https://openapi.programming-hero.com/api/ai/tool/${id}`);
            const data = await res.json();
            const PopAiData = data.data;

            showPopup(PopAiData);
        }

        // show popup dynamicaly
        const showPopup = (PopAiData) => {

            const overPop = document.getElementById('over-pop');

            // create popup
            overPop.innerHTML = `
            <div class="pops">
            <div class="pop-up">
                <div class="left-card">
                    <h2>${PopAiData.description}</h2>
                    <div class="mini-card">
                        <span class="basic">${PopAiData.pricing[0].price} <br> ${PopAiData.pricing[0].plan} </span>
                        <span class="pro"> ${PopAiData.pricing[1].price} <br> ${PopAiData.pricing[1].plan} </span>
                        <span class="enterprise"> ${PopAiData.pricing[2].price} <br> ${PopAiData.pricing[2].plan} </span>
                    </div>
                    <div class="foot">
                        <div class="left">
                            <h3>Features</h3>
                            <ul>
                                <li>${PopAiData.features[1].feature_name}</li>
                                <li>${PopAiData.features[2].feature_name}</li>
                                <li>${PopAiData.features[3].feature_name}</li>
                            </ul>
                        </div>
                        <div class="right">
                            <h3>Integrations</h3>
                            <ul>
                                <li>${PopAiData.integrations[0]}</li>
                                <li>${PopAiData.integrations[1]}</li>
                                <li>${PopAiData.integrations[2]}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right-card">
                    <img src="${PopAiData.image_link[0]}" alt="">
                    <h2>${PopAiData.input_output_examples[0].input}</h2>
                    <p>${PopAiData.input_output_examples[0].output}</p>
                </div>
            </div>
        </div>
        <i onclick="closePopup()" class="fa-solid fa-xmark"></i> `;

        }



        // close pop-up..............
        function closePopup() {
            document.getElementById("over-pop").style.display = "none";
        }

    </script>


</body>

</html>