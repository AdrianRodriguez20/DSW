<h1 class="page-header">
    <?=(isset($persona) && is_object($persona) ? $persona->dni : '' != null) ? $persona->dni : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <i><a href="?c=persona">persona</a><li>
  <i >&nbsp↳&nbsp</i>
  <i class="active"><?=((isset($persona) && is_object($persona) ? $persona->dni : '' != null) != null) ? $persona->dni  : 'Nuevo Registro'; ?><li>
</ol>
<?php 
    if ($editar){
       $accion ="?c=persona&a=guardar&dni=<?={$_GET['dni']}; ?>"; 
    }else { 
        $accion ="?c=persona&a=guardar" ;
    }
        ?>

<form id="frm-persona" action="<?=$accion?>" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" />
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?= isset($persona) && is_object($persona) ? $persona->nombre : ''; ?>" class="form-control" placeholder="Ingrese su nombre" required>
    </div>
      <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellidos" value="<?= isset($persona) && is_object($persona) ? $persona->apellidos : ''; ?>" class="form-control" placeholder="Ingrese sus apellidos" required>
    </div>
    
    <div class="form-group">
        <label>DNI</label>
        <input type="text" name="dni" value="<?= isset($persona) && is_object($persona) ? $persona->dni : ''; ?>"  class="form-control" placeholder="Ingrese su dni " required>
    </div>
    
    <div class="form-group">
        <label>Edad</label>
        <input type="text" name="edad" value="<?= isset($persona) && is_object($persona) ? $persona->edad : ''; ?>" class="form-control"  placeholder="Ingrese su edad" required>
    </div>
        
    <div class="form-group">
        <label>Calle</label>
        <input type="text" name="calle" value="<?= isset($persona) && is_object($persona) ? $persona->calle : ''; ?>" class="form-control"  placeholder="Ingrese su calle" required>
    </div>

    <div class="form-group">
        <label>Código Postal</label>
        <input type="text" name="cp" value="<?= isset($persona) && is_object($persona) ? $persona->cp : ''; ?>" class="form-control"  placeholder="Ingrese su código postal" required>
    </div>

    <div class="form-group">
        <label>Provincia</label>
        <input type="text" name="provincia" value="<?= isset($persona) && is_object($persona) ? $persona->provincia : ''; ?>" class="form-control"  placeholder="Ingrese su provincia" required>
    </div>

    <div class="form-group">
        <label>Número</label>
        <input type="text" name="numero" value="<?= isset($persona) && is_object($persona) ? $persona->numero : ''; ?>" class="form-control"  placeholder="Ingrese su número" required>
    </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>