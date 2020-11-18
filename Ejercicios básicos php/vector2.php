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
}
?>
<form action="vector2.php" method="get">
Numero de Elementos:
<input type="text" name="n" size="5">
<input type="submit" value="Aceptar">
</form>
<br>
<br>
<form action="vector2.php" method="post">
 <?php
 if ( isset($_GET['n']) ){
     $n = $_GET['n'];

 }else{
     $n=3;
 }
 for ($i=1; $i<=$n; $i++){
     echo $i;
     echo "<input type='text' name='vec[] size='10'>";
     echo "<br>";

 }
 ?>
 <input type="submit">
 </form>
</form>
</body>
</html>