<?php
require_once 'model/localidad.php';

class LocalidadController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Localidad();
    }

    public function Index()
    {
        require_once 'view/header.php';
        require_once 'view/localidad.php';
        require_once 'view/footer.php';
    }

    public function Crud()
    {
        $alm = new Localidad();

        if (isset($_REQUEST['clave'])) {
            $alm = $this->model->Obtener($_REQUEST['clave']);
        }

        require_once 'view/header.php';
        require_once 'view/localidad.php';
        require_once 'view/footer.php';
    }

    public function Guardar()
    {
        $alm = new Localidad();

        $alm->clave = $_REQUEST['clave'];
        $alm->descripcion = $_REQUEST['descripcion'];
        $alm->id_municipio = $_REQUEST['id_municipio'];
        $alm->id_variante_linguistica = $_REQUEST['id_variante_linguistica'];

        $alm->id > 0
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        header('Location: index.php');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['clave']);
        header('Location: index.php');
    }
}