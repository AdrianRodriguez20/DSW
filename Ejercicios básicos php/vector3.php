<!DOCTYPE html>
<html>
<head>
  <title>Ejercicios basicos php</title>
</head>
<body>
<?php
if (isset($_POST['vec'])){
    $vector=$_POST['vec'];
    $n =count($vector);
    $suma =0;
    echo "el vector tiene $n elementos <br>";
    for($i=0; $i<$n; $i++){
        echo "$i = $vector[$i] <br>";
        $suma =$suma +$vector[$i];
    }
    echo "la suma es $suma <br>";
    $n = $_POST['n'];
}else{
    $n=3;
    $vector[]=0;
    $vector[]=0;
    $vector[]=0;
}
?>
<form action="vector3.php" method="post">
Numero de Elementos:
<input type="text" name="n" size="5" value="<?php echo $n;?>">
<br>
<?php
    for($i=0; $i<$n; $i++){
        echo $i;
        echo "<input type='text' name='vec[]' value='$vector[$i]' >";
        echo "<br>";
    }
   
?>
<input type="submit">
 </form>
 </html>