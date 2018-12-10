<?php
class Localidad
{
	private $pdo;

	public $clave;
	public $descripcion;
	public $id_municipio,$municipio;
	public $id_variante_linguistica,$variante_linguistica;

	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar($id_agrupacion_linguistica)
	{
		try {
			$result = array();
			//"SELECT l.clave,l.descripcion,m.clave as id_municipio,m.descripcion as municipio,vl.id as id_variante_linguistica,vl.descripcion as variante_linguistica FROM localidad as l INNER JOIN municipio as m on l.id_municipio=m.clave INNER JOIN variante_linguistica as vl on l.id_variante_linguistica=vl.id;"
			$stm = $this->pdo->prepare(
				"SELECT l.clave,l.descripcion,m.clave as id_municipio,m.descripcion as municipio,vl.id as id_variante_linguistica,vl.descripcion as variante_linguistica,al.id as id_agrupacion_linguistica FROM localidad as l INNER JOIN municipio as m on l.id_municipio=m.clave INNER JOIN variante_linguistica as vl on l.id_variante_linguistica=vl.id INNER JOIN agrupacion_linguistica as al on vl.id_agrupacion_linguistica=al.id
				WHERE al.id=$id_agrupacion_linguistica
				");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($clave)
	{
		//"SELECT * FROM localidad as l inner join agrupacion_linguistica as al on l.id_agrupacion_linguistica=al.id WHERE clave = ?"
		try {
			$stm = $this->pdo
				->prepare("Nada my friend");


			$stm->execute(array($clave));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE localidad SET 
						descripcion          = ?, 
						id_municipio        = ?,
						id_variante_linguistica            = ?
				    WHERE clave = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->descripcion,
						$data->id_municipio,
						$data->id_variante_linguistica
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Alumno $data)
	{
		try {
			$sql = "INSERT INTO localidad (descripcion,id_municipio,id_variante_linguistica,FechaNacimiento,FechaRegistro) 
		        VALUES (?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->descripcion,
						$data->id_municipio,
						$data->id_variante_linguistica
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function customSQL(){
		return "
		SELECT l.clave,l.descripcion,m.clave as id_municipio,m.descripcion as municipio,vl.id as id_variante_linguistica,vl.descripcion as variante_linguistica FROM localidad as l INNER JOIN municipio as m on l.id_municipio=m.clave INNER JOIN variante_linguistica as vl on l.id_variante_linguistica=vl.id;
		";
	}
}