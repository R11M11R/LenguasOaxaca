<?php
require_once 'model/variante_linguistica.php';
//require_once 'model/localidad.php';

class Variante_LinguisticaController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Variante_Linguistica();
    }

    public function Index()
    {
        require_once 'view/header.php';
        require_once 'view/variante_linguistica.php';
        require_once 'view/footer.php';
    }

    public function Crud()
    {
        $alm = new Variante_Linguistica();
        $this->model = new Variante_Linguistica();

        if (isset($_REQUEST['id'])) {//where id = xx
            $alm = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/localidad.php';
        require_once 'view/footer.php';
    }

    public function Guardar()
    {
        $alm = new AgrupacionLinguistica();

        $alm->id = $_REQUEST['id'];
        $alm->descripcion = $_REQUEST['descripcion'];
        $alm->id_agrupacion_linguistica = $_REQUEST['id_agrupacion_linguistica'];
        $alm->agrupacion_linguistica = $_REQUEST['agrupacion_linguistica'];

        $alm->id > 0
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        header('Location: index.php');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}