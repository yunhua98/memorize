<html>
<head>
    <link rel="stylesheet" type="text/css" href="/morize/mem.css">
    <script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type = "text/javascript">
        $(function() {
            var hidden = $('.hidden');
            var button = $('button.hide')
            button.on('click', function(){
                hidden.toggleClass('active');
            });
        });
    </script>
</head>

<body>
    <button class = "hide">Toggle Text</button>
    <div class = "outputWrapper">
    <p class = "output">
    
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
                    echo "<span class = \"hidden\" >" . stripslashes(utf8_decode(substr($word, 0, $strPos - 1))) . "</span>" , " ";
                }
                else {
                    echo "<span>" . stripslashes(utf8_decode(substr($word, 0, $strPos - 1))) . "</span>" , " ";
                }
                echo "<br>";
                $word = substr($word, $strPos + 1);
            }
            
        }
        if(strlen($word) > $wordLength) {
            echo "<span class = \"hidden\" >" . stripslashes(utf8_decode($word)) . "</span>" , " ";
        }
        else {
            echo "<span>" . stripslashes(utf8_decode($word)) . "</span>" , " ";
        }
    }
    
    ?>

    </p>
    </div>

    <div class = "wrapper">
            <a href = "index.html">Memorize something else...</a>
    </div>
    <p class="footnote">&copy; 2016 Yunhua Zhao. All rights reserved.</p>
</body>
</html>