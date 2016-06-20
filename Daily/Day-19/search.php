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
            <h1 class="page-header">File manager</h1>
            <form action="search.php" method="post">
                <input type="text" class="form-control" placeholder="search in this directory" aria-describedby="basic-addon1">
                <button class="btn btn-lg btn-default" type="submit">Search</button>
            </form>
            <?php

                define('ROOT', '/home/mikayel/Desktop/ACA/Daily/Day-19/test-directory');

                $path = $_POST['path'];
                $array = scanAll($path);

                echo '<pre>';
                var_dump($array);
                echo '</pre>';

                function scanAll($string = ''){
                    $temp = [];
                    foreach ($temp as $key => $value){
                        if ($value == '.' || $value == '..'){
                            continue;
                        }
                        $tempString = ROOT . $string . '/' . $value;
                        if (is_dir($tempString)){
                            $nestedDirectory = scanAll($string . '/' .$value);
                            unset($temp[$key]);
                            $temp[$tempString] = $nestedDirectory;
                            continue;
                        }
                        $tempValue = $value;
                        unset($temp[$key]);
                        $temp[$tempString] = $tempValue;
                    }
                    return $temp;
                }
                $array = scandir(ROOT . $path);
                foreach ($array as $key => $value){
                    if (is_dir(ROOT . $path . '/' . $value)){
                        echo '<a href="?path=' . $path . '/' . $value . '">' . $value . '<span class="glyphicon glyphicon-folder-open yellow"></span></a></br>';
                    } else {
                        echo $value . '</br>';
                    }
                }
            ?>
        </div>
        //3 hat tarber icon folder file img, search avelacnel mekel infon cuyc tal
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
</body>
</html>







<?php

