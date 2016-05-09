<html>
<head>
    <link rel="stylesheet" type="text/css" href="mem.css">
</head>

<body>
    
    <p class = "big">
    
    <?php
    
    $inputArray = explode(" ",$_POST["mem"]);
    $outputArray = array();
    
    foreach ($inputArray as &$word) {
        if(strstr($word, PHP_EOL)) {
            $numOfNewLines = substr_count($word, PHP_EOL);
            for ($i = 0; $i < $numOfNewLines; $i++) {
                $strPos = strpos($word, PHP_EOL);
                echo "<span class = \"reveal\" >" . substr($word, 0, $strPos) . "</span>" , " ";
                echo "<br>";
                $word = substr($word, $strPos + 1);
            }
        }
        else {
            echo "<span class = \"reveal\" >" . $word . "</span>" , " ";
        }
    }
    
    ?>

    </p>

</body>
</html>