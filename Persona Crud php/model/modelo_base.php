<?php
require_once 'Connection.php';

class ModeloBase extends Connection {
    public $conn;
    public $tabla;
    public $clavePrimaria;
    public $objects;
    /**
     * Construnctor por defecto de la clase
     */
    function __construct()
    {
        parent::__construct();
    }


    /**
     * Funcion encargada de generar la consulta sql de insertar
     * @access public
     * @param @argumentos columnas de la bbdd
     * @param @valores valores de las columnas de la bbdd 
     */
    function insertar($argumentos, $valores) {
        
        $conn=parent::connect();
        $sql = "INSERT INTO " .$this->tabla. " (".implode(',',   $argumentos).")".
                " VALUES (".implode(',',$valores).");";

        $resultado=$conn->query($sql);
        echo $sql;
        if($resultado){
           $save=true;
        } else{
            $save=false;
        } 
        $conn=parent::disconnect();
        return $save;
    }

 

    /**
     * Funcion encargada de generar la consulta sql para realizar la modificacion
     * de un elemento
     * @access public
     * @param @array de valores de los elementos
     * @param @id valor de la clave primaria a traves de la que se realiza la modificacion
     */
    function modificar($array, $id) {
        $conn=parent::connect();
        $contador = 1;
        $tamanio = count($array);
    
        $sql ="UPDATE ".$this->tabla. " SET "; 
        foreach ($array as $clave => $valor) {
            $coma = ( $contador < $tamanio ) ? "," : " ";
            $sql .= $clave . " = " ."'". $valor ."'". $coma;
            $contador++;
        }
        $sql .= "WHERE ".$this->clavePrimaria."= '".$id."';";
        $resultado=$conn->query($sql);
        $conn=parent::disconnect();

        if($resultado){
            $save=true;
         } else{
             $save=false;
         } 
        return $save;

    }

    /**
     * Funcion encargada de realizar la sentencia sql para eliminar un registro de la 
     * BBDD.
     * @access public 
     * @param @id valor de la clave primaria para eliminar de la BBDD
     */
    function eliminar($id) {
        $conn=parent::connect();
        $sql = " DELETE FROM ".$this->tabla. 
        " WHERE ".$this->clavePrimaria."= '".$id."';";
        $resultado=$conn->query($sql);
        if($resultado){
            echo"bien";
        } else{
            echo"mal";
        } 
        $conn=parent::disconnect();
    }
    /**
     * Funcion encargada de realizar la consulta para listar los datos
     * de la BBDD
     * @access public
     * @param $array-> lista de columnas y valores
     * @param $operador -> operador de la sentencia (AND, ORD,..)
     */
    function listar($array, $operador="") {
        $conn=parent::connect();
        $contador = 0;
        $tamanio = count($array);

        $sql = " SELECT * FROM ".$this->tabla. " WHERE ";

        foreach ($array as $clave => $valor) {
            $concatenar = ( $contador < $tamanio ) ? $operador : " ";
            $sql .= $clave . " = " . $valor . $concatenar;
            $contador++;
        }
        $resultado=$conn->query($sql);
        echo $sql;
        if($resultado){
            echo"bien buscar";
        } else{
            echo"mal buscar";
        } 
        $conn=parent::disconnect();
        return $array;
    }
   /**
     * Funcion de listar toda la base de datos
     * de la BBDD
     * @access public

     */
    function getAll (){
        $conn=parent::connect();
        $sql = "SELECT * FROM ".$this->tabla;
        $resultado=$conn->query($sql);
        while($filas=$resultado->fetch_assoc()){
            $this->objects[]=$filas;
        }
        $conn=parent::disconnect();
        return $this->objects;   
    }

    /**
     * Funcion encargada de realizar la consulta sql para realizar la consulta
     * @access public
     * @param $id por el que se realiza la busqueda
     * @return sentencia sql construida
     */
    function buscar($id) {
        $conn=parent::connect();
        $sql = " SELECT * FROM ".$this->tabla. 
        " WHERE ".$this->clavePrimaria."= '".$id."';";
        $resultado=$conn->query($sql);
        echo $sql;
        if($resultado){
            echo"bien buscar";
        } else{
            echo"mal buscar";
        } 
        $conn=parent::disconnect();
        return $resultado->fetch_object();
    }

    function buscarPor($clave,$valor){
        $conn=parent::connect();
        $sql = " SELECT * FROM ".$this->tabla. 
        " WHERE ".$clave."= '".$valor."';";
        $resultado=$conn->query($sql);
        if($resultado){
            echo"bien buscar";
        } else{
            echo"mal buscar";
        } 
        echo $sql;
        while($filas=$resultado->fetch_assoc()){
            $this->objects[]=$filas;
        }
        $conn=parent::disconnect();
        return $this->objects;
    }

}
