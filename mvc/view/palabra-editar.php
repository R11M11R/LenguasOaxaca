<h1 class="page-header">
    <?php echo $_palabra->id != null ? $_palabra->escritura : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=palabra">Palabras</a></li>
  <li class="active"><?php echo $_palabra->id != null ? $_palabra->escritura : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-palabra" action="?c=palabra&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_palabra->id; ?>" />
    
    <div class="form-group">
        <label>escritura</label>
        <input type="text" name="escritura" value="<?php echo $_palabra->escritura; ?>" class="form-control" placeholder="Ingrese su escritura" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>pronunciacion</label>
        <input type="text" name="pronunciacion" value="<?php echo $_palabra->pronunciacion; ?>" class="form-control" placeholder="Ingrese su pronunciacion" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-palabra").submit(function(){
            return $(this).validate();
        });
    })
</script>