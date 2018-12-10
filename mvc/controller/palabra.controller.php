<?php
require_once 'model/palabra.php';

class PalabraController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Palabra();
    }

    public function Index()
    {
        require_once 'view/header.php';
        require_once 'view/palabra.php';
        require_once 'view/footer.php';
    }

    public function Crud()
    {
        $_palabra = new Palabra();

        if (isset($_REQUEST['id'])) {
            $_palabra = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/palabra.php';
        require_once 'view/footer.php';
    }

    public function Guardar()
    {
        $_palabra = new Palabra();

        $_palabra->id = $_REQUEST['id'];
        $_palabra->escritura = $_REQUEST['escritura'];
        $_palabra->pronunciacion = $_REQUEST['pronunciacion'];
        $_palabra->id_localidad = $_REQUEST['id_localidad'];
        $_palabra->id_clasificacion = $_REQUEST['id_clasificacion'];
        $_palabra->id_significado = $_REQUEST['id_significado'];

        $_palabra->id > 0
            ? $this->model->Actualizar($_palabra)
            : $this->model->Registrar($_palabra);

        header('Location: index.php');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
    public function customSQL(){
        return "
        
        ";
    }
}