<h1 class="page-header">Palabras</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Palabra&a=Crud">Nuevo Palabra</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Escritura</th>
            <th>Pronunciacion</th>
            <th style="width:120px;">Clasificacion</th>
            <th style="width:120px;">Significado</th>            
            <th>Localidad</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($this->model->Listar() as $r) : ?>
        <tr>
        <!--[mp3]  <source src="horse.mp3" type="audio/mpeg"> -->
            <td><?php echo $r->escritura; ?></td>
            <td><audio controls>            
  <source src=<?php echo $r->pronunciacion; ?> type="audio/ogg">
</audio></td>            
            
            <td><?php echo $r->clasificacion; ?></td>
            <td><?php echo $r->significado; ?></td>
            <td><?php echo $r->localidad; ?></td>
            <td>
                <a href="?c=Palabra&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Palabra&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
