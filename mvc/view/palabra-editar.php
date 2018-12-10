<h1 class="page-header">
    <?php echo $_palabra->id != null ? $_palabra->escritura : 'Nueva Palabra'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=palabra">Palabras</a></li>
  <li class="active"><?php echo $_palabra->id != null ? $_palabra->escritura : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-palabra" action="?c=palabra&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_palabra->id; ?>" />
    <?php
    
        echo " <table class='table'>";
        try {
            $mbd = new PDO('mysql:host=localhost;dbname=lenguas;charset=UTF8', "root", "");        
            echo " Clasificacion : <select id='mySelect2' onchange='myFunction2()'>";
        echo "<option value='-1'>Seleccione clasificación</option>";
        foreach ($mbd->query('SELECT * from clasificacion') as $fila) {
            echo "<option value='" . $fila[0].'-'.$fila[2] . "'>" . $fila[1] . "</option>";
        }
        echo "</select>";
        }
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        echo "</table>";    
    ?>
    <?php
    
    echo " <table class='table'>";
    try {
        $mbd = new PDO('mysql:host=localhost;dbname=lenguas;charset=UTF8', "root", "");        
        echo " Significado : <select id='mySelect2' onchange='myFunction2()'>";
    echo "<option value='-1'>Seleccione significado</option>";
    foreach ($mbd->query('SELECT * from significado') as $fila) {
        echo "<option value='" . $fila[0].'-'.$fila[2] . "'>" . $fila[1] . "</option>";
    }
    echo "</select>";
    }
    catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    echo "</table>";

?>
    
    <div class="form-group">
        <label>escritura</label>
        <input type="text" name="escritura" value="<?php echo $_palabra->escritura; ?>" class="form-control" placeholder="Ingrese su escritura" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>pronunciacion</label>
        <form enctype="multipart/form-data" id="form1" method="post" action="text1.php">
        <input type="file" name="file1" accept=".ogg,.flac,.mp3" required="required"/>
        <input type="submit" name="submit"/>
        </form>
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