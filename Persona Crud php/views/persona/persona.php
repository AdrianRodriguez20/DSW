<h1 class="page-header">Persona</h1>


<?php 
    if($listado==null) {
        echo "Registros: 0";
    }else{
        echo "Registros: ".count($listado);
    }
?>

<form action="?c=persona&a=buscarPor&nombre" method="POST">
    <div class="input-group col-xl-4 offset-md-8 mb-3">
    <input type="text" name="valorBusqueda" class="form-control rounded" placeholder="Search"/>
    <select class="mr-3" name="opcion"> <br>   
        <option value="nombre">Nombre</option>    
        <option value="dni">DNI</option>      
    </select>
    <button type="submit" class="btn btn-outline-primary mr-3" >Buscar</button>
    </div>
</form>

<a class="btn btn-primary float-right" href="?c=persona&a=crud">Agregar</a>

<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
            <th class="bg-dark text-white" style="width:120px;">Nombre</th>
            <th class="bg-dark text-white" style="width:120px;">Apellidos</th>
            <th class="bg-dark text-white" style="width:180px;">DNI</th>
            <th class="bg-dark text-white" style="width:180px;">Edad</th>
            <th class="bg-dark text-white" style="width:180px;">Calle</th>
            <th class="bg-dark text-white" style="width:180px;">CP</th>
            <th class="bg-dark text-white" style="width:180px;">Provincia</th>
            <th class="bg-dark text-white" style="width:180px;">Número</th>
            <th class="bg-dark text-white" style="width:60px;"></th>
            <th class="bg-dark text-white" style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php if($listado!=null) if (count($listado) > 0) : foreach ($listado as $r) : ?>
                <tr>
                    <td><?= $r["nombre"] ?></td>
                    <td><?= $r["apellidos"] ?></td>
                    <td><?= $r["dni"] ?></td>
                    <td><?= $r["edad"] ?></td>
                    <td><?=$r["calle"]?></td>
                    <td><?=$r["cp"]?></td>
                    <td><?=$r["provincia"]?></td>
                    <td><?=$r["numero"]?></td>

                    <td>
                        <a class="btn btn-warning" href="?c=persona&a=crud&dni=<?= $r["dni"]; ?>">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=persona&a=eliminar&dni=<?= $r["dni"]; ?>">Eliminar</a>
                    </td>
                    </td>
                <?php endforeach; ?>
            <?php endif; ?>
    </tbody>
</table>

</body>
<script src="assets/js/datatable.js">

</script>


</html>