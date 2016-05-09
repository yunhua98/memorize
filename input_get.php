<html>
<head>
    <link rel="stylesheet" type="text/css" href="/morize/mem.css">
</head>

<body>
    
    <p class = "big">
    
    <?php
    header("Content-Type: text/html; charset=utf-8");
    $wordLength = $_POST["wordLength"];
    $inputArray = explode(" ",utf8_encode($_POST["mem"]));
    $outputArray = array();
    
    foreach ($inputArray as &$word) {
        if(strstr($word, PHP_EOL)) {
            $numOfNewLines = substr_count($word, PHP_EOL);
            for ($i = 0; $i < $numOfNewLines; $i++) {
                $strPos = strpos($word, PHP_EOL);
                if(strlen(substr($word, 0, $strPos - 1)) > $wordLength) {
                    echo "<span class = \"reveal\" >" . stripslashes(utf8_decode(substr($word, 0, $strPos - 1))) . "</span>" , " ";
                }
                else {
                    echo "<span>" . stripslashes(utf8_decode(substr($word, 0, $strPos - 1))) . "</span>" , " ";
                }
                echo "<br>";
                $word = substr($word, $strPos + 1);
            }
            
        }
        if(strlen($word) > $wordLength) {
            echo "<span class = \"reveal\" >" . stripslashes(utf8_decode($word)) . "</span>" , " ";
        }
        else {
            echo "<span>" . stripslashes(utf8_decode($word)) . "</span>" , " ";
        }
    }
    
    ?>

    </p>

</body>
</html>