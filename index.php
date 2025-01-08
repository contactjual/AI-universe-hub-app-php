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

                        echo "<div onclick='openPopup($id)' class='card'>                                    
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
                
                        $inner_array_length = count($links);

                        for ($y = 0; $y < $inner_array_length; $y++) {

                            // $link = $links[$y];
                            // $name = $link->name;
                            // $url = $link->url;
                
                            // echo $name;
                
                            // echo $url;
                
                            // echo "<br>";
                
                        }
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

        $url = "https://openapi.programming-hero.com/api/ai/tool/$id";

        $data2 = file_get_contents($url);

        if ($data2 !== false) {
            print_r($data2);
            echo "<br>";
        } else {
            $mess2 = "Sorry data2 not found";
            echo $mess2;
        }


        ?>


        <!-- popup dynamicaly -->
        <section class="over-area" id="over-pop">

            <div class="pops">
                <div class="pop-up">
                    <div class="left-card">
                        <h2>GitHub Copilot is an AI-powered code autocompletion tool that uses OpenAI's GPT technology
                            to suggest code snippets and completions based on natural language input.</h2>
                        <div class="mini-card">
                            <span class="basic">$10/month <br> Basic </span>
                            <span class="pro"> $50/month <br> pro </span>
                            <span class="enterprise"> Contact us for <br> pricing Enterprise</span>
                        </div>
                        <div class="foot">
                            <div class="left">
                                <h3>Features</h3>
                                <ul>
                                    <li>[1].feature_name</li>
                                    <li>[2].feature_name</li>
                                    <li>[3].feature_name</li>
                                </ul>
                            </div>
                            <div class="right">
                                <h3>Integrations</h3>
                                <ul>
                                    <li>[1].feature_name</li>
                                    <li>[2].feature_name</li>
                                    <li>[3].feature_name</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right-card">
                        <img src="https://img.olhardigital.com.br/wp-content/uploads/2023/01/chatgpt_assistente.jpg"
                            alt="">
                        <h2>Hi, how are you doing today?</h2>
                        <p>I'm doing well, thank you for asking. How can I assist you today?</p>
                    </div>
                </div>
            </div>
            <i onclick='closePopup()' class='fa-solid fa-xmark'></i>

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


    <!-- manage pop-up open-close by javaScript........... -->

    <script>

        // open pop-up...............
        function openPopup($id_number) {
            document.getElementById("over-pop").style.display = "flex";

            // get id number ...
            console.log($id_number);
            
        }

        // close pop-up..............
        function closePopup() {
            document.getElementById("over-pop").style.display = "none";
        }

    </script>

</body>

</html>