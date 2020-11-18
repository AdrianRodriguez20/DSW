<html>
<head>
<title>Ejercicios basicos de php</title>
</head>
<body>
<h1>VECTORES</h1>
    <?php
    $ciudad[]="La Laguna";
    $ciudad[]="Santa Cruz";
    $ciudad[]="Puerto de La Cruz";
    $ciudad[]="Los Realejos";
    $n = count($ciudad);
    echo "numero de elementos ".$n;
    for ($i=0; $i <$n ; $i++) { 
    echo "<br>Ciudad:". $i." <h1> ". $ciudad[$i]."</h1>";
    }
    ?>
</body>
</html>