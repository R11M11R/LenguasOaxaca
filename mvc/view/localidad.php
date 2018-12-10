<h1 class="page-header">Localidad</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Localidad</th>            
            <th style="width:180px;">Municipio</th>
            <th >Variante Linguistica</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
       </thead>
    <tbody>
    <?php foreach ($this->model->Listar($_GET['id']) as $r) : ?>
        <tr>
            <td><?php echo $r->descripcion; ?></td>            
            <td><?php echo $r->municipio; ?></td>
            <td><?php echo $r->variante_linguistica; ?></td>
            <td>
                <a href="?c=palabra&id=<?php echo $r->clave; ?>">Reforzar Palabras</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
