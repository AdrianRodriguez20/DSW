<?php
trait validacionesPersona {
function validarDni($dni){

$reg ='^[0-9]{8}([A-Z]{1}|[a-z]{1})$^';

if (preg_match($reg, $dni)){

    return true;

}

return false;

}
}
?>
