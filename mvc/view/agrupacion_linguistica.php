<h1 class="page-header">Lenguas Indígenas de Oaxaca</h1>

<!--<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Agrupacion_Linguistica&a=Crud">Nuevo Agrupacion_Linguistica</a>
</div>-->

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Lenguas</th>
            <th>Familia Linguistica </th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($this->model->Listar() as $r) : ?>
        <tr>
            <td><?php echo $r->descripcion; ?></td>
            
  <td><?php echo $r->familia_linguistica; ?> </td>

            <td>
                <a href="?c=variante_linguistica&a=Crud&id=<?php echo $r->id; ?>">Acceder</a>
            </td>
            
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
