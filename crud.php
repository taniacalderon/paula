<?php


// Pagina Princilap index.html
// Explicar sentencia por Sentencia.

// Registro de Usuarios


require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new Alumno();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('identificacion',              $_REQUEST['identificacion']);
            $alm->__SET('Nombres',                       $_REQUEST['Nombres']);
            $alm->__SET('Apellidos',                     $_REQUEST['Apellidos']);
            $alm->__SET('telefono',            			 $_REQUEST['telefono']);
            $alm->__SET('direccion', 					 $_REQUEST['direccion']);
			$alm->__SET('correomisena', 				 $_REQUEST['correomisena']);

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.php');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('identificacion', $_REQUEST['identificacion']);
			$alm->__SET('Nombres',        $_REQUEST['Nombres']);
            $alm->__SET('Apellidos',      $_REQUEST['Apellidos']);
            $alm->__SET('telefono',       $_REQUEST['telefono']);
            $alm->__SET('direccion',      $_REQUEST['direccion']);
			$alm->__SET('correomisena',    $_REQUEST['correomisena']);

            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";

			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['identificacion']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['identificacion']);
            break;
    }
}

?>