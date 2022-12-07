<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einzigartige Benutzer</title>
    <style>
        #chartContainer>* {
            z-index: 9999;
        }
    </style>

    <script>
        window.onload = function() {
            // Set the data points
            var dataPoints = [];

            // Configure the chart
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                zoomEnabled: true,
                title: {
                    text: "Einzigartige Benutzer"
                },
                axisY: {
                    title: "Anzahl aktiv",
                    titleFontSize: 20,
                },
                axisX: {
                    valueFormatString: "hh:mm TT",
                },
                data: [{
                    type: "line",
                    dataPoints: dataPoints
                }]
            });

            // Add the data points
            function addData(data) {
                for (var i = 0; i < data.length; i++) {
                    dataPoints.push({
                        x: new Date(data[i][0]),
                        y: data[i][1]
                    });
                }
                chart.render();
            }

            // Get the data from the json file
            fetch('./data.json')
                .then((response) => response.json())
                .then((json) => {
                    // Convert to associative array
                    addData(Object.entries(json));
                    console.log(json)
                });
        }
    </script>
</head>

<body>
    <?php
    // Check if hasVisited is set in session and cookie
    if (!isset($_SESSION['hasVisited']) && !isset($_COOKIE['hasVisited'])) {
        // Set hasVisited to true
        $_SESSION['hasVisited'] = true;

        // Save in cookie
        setcookie('hasVisited', true, time() + 60 * 60 * 24 * 7);

        // Get the current date and round it to 10 minutes
        $time = round(time() / 600) * 600;

        // Convert the time to a date
        $time = date('Y-m-d H:i:s', $time);

        // Check if the json file exists
        if (!file_exists('data.json')) {
            // Create the json file
            file_put_contents('data.json', '{}');
        }

        // Get the json
        $json = file_get_contents('data.json');

        // Decode the json
        $data = json_decode($json, true);

        // Check if the time is already in the json
        if (isset($data[$time])) {
            // Add 1 to the time
            $data[$time]++;
        } else {
            // Set the time to 1
            $data[$time] = 1;
        }

        // Encode the json
        $json = json_encode($data);

        // Save the json
        file_put_contents('data.json', $json);
    }
    ?>

    <body>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

        <div>
            <!-- Nice to have for the snow -->
            <script src="https://cdn.jsdelivr.net/npm/tsparticles-preset-snow@2/tsparticles.preset.snow.bundle.min.js"></script>
            <script>
                (async () => {
                    await loadSnowPreset(tsParticles); // this is required only if you are not using the bundle script

                    await tsParticles.load("tsparticles", {
                        preset: "snow",
                    });
                })();
            </script>
        </div>
    </body>

</html>