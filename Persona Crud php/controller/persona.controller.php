<?php

class PersonaController{

    function index(){
        $persona = new Persona();
        $listado = $persona->getAll();
        require_once 'views/persona/persona.php';
    }

   public function crud (){
     $editar=false;
        if (isset($_GET['dni'])){
            $persona=new Persona();
            $editar=true;
            $persona=$persona->buscar($_GET['dni']);  
        }
     require_once 'views/persona/insertar.php';
   }
    public function guardar(){
        
        $persona=new Persona();
        $direccion=new Direccion();
        if ( $_POST['dni']){
            
            $direccion->__set("calle",$_POST['calle']);
            $direccion->__set("cp",$_POST['cp']);
            $direccion->__set("provincia",$_POST["provincia"]);
            $direccion->__set("numero",$_POST["numero"]);

            $persona->__set("direccion",$direccion);

            $persona->__set("nombre",$_POST['nombre']);
            $persona->__set("dni",$_POST['dni']);
            $persona->__set("apellidos",$_POST["apellidos"]);
            $persona->__set("edad",$_POST["edad"]);
           
            
            $valores=array("'".$persona->__get("nombre")."'","'"
                              .$persona->__get("apellidos")."'","'"
                              .$persona->__get("dni")."'","'"
                              .$persona->__get("edad")."'","'"
                              .$persona->__get("direccion")->calle."'","'"
                              .$persona->__get("direccion")->cp."'","'"
                              .$persona->__get("direccion")->provincia."'","'"
                              .$persona->__get("direccion")->numero."'"
                            );

            $argumentos=array("nombre", "apellidos","dni","edad","calle","cp","provincia","numero");


        }
       
        if(isset($_GET['dni'])){
            $array = array(
                "nombre" => $persona->__get("nombre"),
                "apellidos" => $persona->__get("apellidos"),
                "dni" => $persona->__get("dni"),
                "edad" => $persona->__get("edad"),
                "calle" => $persona->__get("direccion")->calle,
                "cp" => $persona->__get("direccion")->cp,
                "provincia" => $persona->__get("direccion")->provincia,
                "numero" => $persona->__get("direccion")->numero,
            );
            
            $persona->modificar($array,$persona->__get("dni"));
            header('Location: index.php?c=persona'); 
        
        }else{

          if( $persona->insertar($argumentos,$valores)){

            header('Location: index.php?c=persona'); 
          }
      
        }
      
    }
    public function eliminar(){
        $persona=new Persona();
        $persona->eliminar($_GET['dni']);
        header('Location: index.php?c=persona');
    }

    public function buscarPor(){
        $persona = new Persona();
        if(isset($_POST['opcion'])&&isset($_POST['valorBusqueda'])){
            $listado = $persona->buscarPor($_POST['opcion'],$_POST['valorBusqueda']);
        }
       
        require_once 'views/persona/persona.php';
    }
}

?>
