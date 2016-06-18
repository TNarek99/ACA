<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <!-- build
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">google chart</h1>
                <div id="piechart" style="width: 900px; height: 500px;"></div>
                <?php
                    $charArray = [];
                    $file = fopen('Text.txt', 'r');
                    while (!feof($file)){
                        $array = explode(' ', fgets($file));
                    }
                    fclose($file);

                    for ($i=0;$i<count($array);$i++){
                            if (isset($charArray[strlen($array[$i])])){
                                $charArray[strlen($array[$i])]++;
                            } else {
                                $charArray[strlen($array[$i])] = 1;
                            }
                    }
                    var_dump($array);

                ?>
            </div>

        </div>
    </div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- build
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="JS/script.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable(<?php
                    $i = 0;
                    echo '[';
                    echo '[ "Char", "Count"],';
                    foreach ($charArray as $key => $value) {
                        if ($i != count($charArray) -1 ){
                            echo '[ "' . $key . '" , ' . $value . '],';
                            $i++;
                        } else {
                            echo '[ "' . $key . '" ,' . $value . ']';
                        }

                    }
                    echo ']';
                ?>);

            var options = {
                title: 'My Pie chart'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</body>
</html>
