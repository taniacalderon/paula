<?php

class AlumnoModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
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

            $stm = $this->pdo->prepare("SELECT * FROM  Alumno");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Alumno();

                $alm->__SET('identificacion', $r->identificacion);
                $alm->__SET('Nombres', $r->Nombres);
                $alm->__SET('Apellidos', $r->Apellidos);
                $alm->__SET('telefono', $r->telefono);
                $alm->__SET('direccion', $r->direccion);
				$alm->__SET('correomisena', $r->correomisena);

                $result[] = $alm;
            }

            return $result;
        }
		catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($identificacion)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM alumno WHERE identificacion = ?");
                      

            $stm->execute(array($identificacion));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Alumno();
            $alm->__SET('identificacion', $r->identificacion);
            $alm->__SET('Nombres', $r->Nombres);
            $alm->__SET('Apellidos', $r->Apellidos);
            $alm->__SET('telefono', $r->telefono);
            $alm->__SET('direccion', $r->direccion);
			$alm->__SET('correomisena', $r->correomisena);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($identificacion)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM alumno WHERE identificacion = ?");                      

            $stm->execute(array($identificacion));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

        public function Actualizar(alumno $data)
    {
        try 
        {
            $sql = "UPDATE alumno SET 
                        Nombres          = ?, 
                        Apellidos        = ?,
                        telefono         = ?, 
                        direccion        = ?,
						correomisena     = ?
                    WHERE identificacion = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('Nombres'), 
                    $data->__GET('Apellidos'), 
                    $data->__GET('telefono'),
                    $data->__GET('direccion'),
                    $data->__GET('correomisena'),
					$data->__GET('identificacion')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Alumno $data)
    {
        try 
        {
        $sql = "INSERT INTO Alumno(identificacion,Nombres,Apellidos,telefono,direccion,correomisena) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('identificacion'), 
				$data->__GET('Nombres'), 
                $data->__GET('Apellidos'), 
                $data->__GET('telefono'),
                $data->__GET('direccion'),
				$data->__GET('correomisena')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>