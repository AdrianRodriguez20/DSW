<?php
trait validacionesDireccion {

    function validarCp($cp){
        $reg ='^[0-9]{5}$^';
        if (preg_match($reg, $cp)){
            return true;
        }
        return false;

    }
}
?>
