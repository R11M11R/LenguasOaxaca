<h1 class="page-header">Lenguas Indígenas de Oaxaca</h1>

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
    
    <?php foreach ($this->model->Listar() as $agrupacion) : ?>
    <tr>
        <td><?php echo $agrupacion->descripcion; ?></td>
        <td><?php echo $agrupacion->familia_linguistica; ?> </td>
        <td>
            <a href="?c=localidad&a=Crud&id=<?php echo $agrupacion->id; ?>">Localidades perteneciente</a>
        </td>
            
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
