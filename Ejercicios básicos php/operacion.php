<html>
<head>
<title>Ejercicios basicos de php</title>
</head>
<body>
    <?php
        $y = $_POST['a'];
        $z = $_POST['b'];

        if (isset ($_POST['btsuma'])){
            $c = $y +$z; 
            echo "la suma de $y + $z es $c";
        }
        if (isset ($_POST['btresta'])){
            $c = $y -$z; 
            echo "la resta de $y - $z es $c";
        }
        if (isset ($_POST['btmult'])){
            $c = $y *$z; 
            echo "la multiplicacion de $y * $z es $c";
        }
        if (isset ($_POST['btdiv'])){
            if ($z != 0){
                $c = $y /$z; 
                echo "la division de $y / $z es $c";
            }
         
          
        }
      
       
    ?>
</body>
</html>