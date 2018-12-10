<?php
class Variante_Linguistica
{
	private $pdo;

	public $id;
	public $descripcion;
	public $id_agrupacion_linguistica;
	public $agrupacion_linguistica;

	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try {
			$result = array();
			
			$stm = $this->pdo->prepare(
				"SELECT vl.id,
				vl.descripcion,
				al.id as id_agrupacion_linguistica,
				al.descripcion as agrupacion_linguistica 
				FROM variante_linguistica as vl 
				inner join agrupacion_linguistica as al on vl.id_agrupacion_linguistica=al.id				
				where al.id=513
				");//nahuatl

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM variante_linguistica WHERE id = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
/*
	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE agrupacion_linguistica SET 
						descripcion          = ?, 
						id_agrupacion_linguistica        = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->descripcion,
						$data->id_agrupacion_linguistica
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Localidad $data)
	{
		try {
			$sql = "INSERT INTO agrupacion_linguistica (descripcion,id_agrupacion_linguistica) 
		        VALUES (?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->descripcion,
						$data->id_agrupacion_linguistica
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function sqlData()
	{
		return "SELECT al.id,al.descripcion,fl.id as id_agrupacion_linguistica,fl.descripcion as agrupacion_linguistica FROM agrupacion_linguistica as al inner join agrupacion_linguistica as fl on al.id_agrupacion_linguistica=fl.id";
	}*/
}