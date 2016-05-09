<html>
<head>
    <link rel="stylesheet" type="text/css" href="/morize/mem.css">
</head>

<body>
    
    <p class = "big">
    
    <?php
    
    $wordLength = $_POST["wordLength"];
    $inputArray = explode(" ",$_POST["mem"]);
    $outputArray = array();
    
    foreach ($inputArray as &$word) {
        if(strstr($word, PHP_EOL)) {
            $numOfNewLines = substr_count($word, PHP_EOL);
            for ($i = 0; $i < $numOfNewLines; $i++) {
                $strPos = strpos($word, PHP_EOL);
                if(strlen(substr($word, 0, $strPos)) > $wordLength) {
                    echo "<span class = \"reveal\" >" . substr($word, 0, $strPos) . "</span>" , " ";
                }
                else {
                    echo "<span>" . substr($word, 0, $strPos) . "</span>" , " ";
                }
                echo "<br>";
                $word = substr($word, $strPos + 1);
            }
            
        }
        if(strlen($word) > $wordLength) {
            echo "<span class = \"reveal\" >" . $word . "</span>" , " ";
        }
        else {
            echo "<span>" . $word . "</span>" , " ";
        }
    }
    
    ?>

    </p>

</body>
</html>