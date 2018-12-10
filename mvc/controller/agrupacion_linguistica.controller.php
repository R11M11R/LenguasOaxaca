<?php
require_once 'model/agrupacion_linguistica.php';
//require_once 'model/variante_linguistica.php';

class Agrupacion_LinguisticaController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Agrupacion_Linguistica();
    }

    public function Index()
    {
        require_once 'view/header.php';
        require_once 'view/agrupacion_linguistica.php';
        require_once 'view/footer.php';
    }

    public function Crud()
    {
        $alm = new Agrupacion_Linguistica();
        //$this->model = new Variante_Linguistica();

        if (isset($_REQUEST['id'])) {//where id = xx            
            $alm = $this->model->Obtener($_REQUEST['id']);
            echo"<script type='text/javascript'>
            alert('$alm->id');            
            </script>";
        }
        
        require_once 'view/header.php';
        require_once 'view/variante_linguistica.php';
        require_once 'view/footer.php';
    }

    /*public function Guardar()
    {
        $alm = new AgrupacionLinguistica();

        $alm->id = $_REQUEST['id'];
        $alm->descripcion = $_REQUEST['descripcion'];
        $alm->id_familia_linguistica = $_REQUEST['id_familia_linguistica'];
        $alm->familia_linguistica = $_REQUEST['familia_linguistica'];

        $alm->id > 0
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        header('Location: index.php');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }*/
}