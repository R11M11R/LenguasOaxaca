<?php
class Palabra
{
	private $pdo;
    
    public $id;
    public $escritura;
    public $pronunciacion;
	public $id_localidad, $localidad;
	public $id_clasificacion, $clasificacion;
	public $id_significado, $significado;
	

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();
			
			$stm = $this->pdo->prepare("SELECT p.id,p.escritura,p.pronunciacion,l.clave as id_localidad, l.descripcion as localidad, c.id as id_clasificacion,c.descripcion as clasificacion,s.id as id_significado,s.escritura as significado FROM palabras as p INNER JOIN localidad as l on p.id_localidad=l.clave INNER JOIN clasificacion as c on p.id_clasificacion=c.id INNER JOIN significado as s on p.id_significado=s.id;");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM palabras WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM palabras WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE palabras SET 
						escritura          = ?, 
						pronunciacion        = ?,
						id_localidad            = ?, 
						id_significado = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->escritura,
                        $data->pronunciacion,
                        $data->id_localidad,
                        $data->id_significado,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Palabra $data)
	{
		try 
		{
		$sql = "INSERT INTO palabras (escritura,pronunciacion,id_localidad,id_significado,id_clasificacion) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->escritura,
                    $data->pronunciacion, 
                    $data->id_localidad,
                    $data->id_significado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function customSQL(){
		return "
		SELECT p.id,p.escritura,p.pronunciacion,l.clave as id_localidad, l.descripcion as localidad, c.id as id_clasificacion,c.descripcion as clasificacion,s.id as id_significado,s.escritura as significado FROM palabras as p INNER JOIN localidad as l on p.id_localidad=l.clave INNER JOIN clasificacion as c on p.id_clasificacion=c.id INNER JOIN significado as s on p.id_significado=s.id;
		";
	}
}