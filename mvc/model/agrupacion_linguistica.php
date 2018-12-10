<?php
class Agrupacion_Linguistica
{
	private $pdo;

	public $id;
	public $descripcion;
	public $id_familia_linguistica;
	public $familia_linguistica;

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
				"SELECT
				al.id,
				al.descripcion,
				fl.id AS id_familia_linguistica,
				fl.descripcion AS familia_linguistica
				FROM
				agrupacion_linguistica AS al
				INNER JOIN familia_linguistica AS fl
				ON
				al.id_familia_linguistica = fl.id;
				");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM agrupacion_linguistica WHERE id = $id");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE agrupacion_linguistica SET 
						descripcion          = ?, 
						id_familia_linguistica        = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->descripcion,
						$data->id_familia_linguistica
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Localidad $data)
	{
		try {
			$sql = "INSERT INTO agrupacion_linguistica (descripcion,id_familia_linguistica) 
		        VALUES (?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->descripcion,
						$data->id_familia_linguistica
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}