<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new Alumno();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('identificacion',              $_REQUEST['identificacion']);
            $alm->__SET('Nombres',          			 $_REQUEST['Nombres']);
            $alm->__SET('Apellidos',        			 $_REQUEST['Apellidos']);
            $alm->__SET('telefono',            			 $_REQUEST['telefono']);
            $alm->__SET('direccion',					 $_REQUEST['direccion']);
			$alm->__SET('correomisena',					 $_REQUEST['correomisena']);

            $model->Actualizar($alm);
            header('Location: index.php');
            break;

        case 'registrar':
			$alm->__SET('identificacion',          $_REQUEST['identificacion']);
            $alm->__SET('Nombres',          		 $_REQUEST['Nombres']);
            $alm->__SET('Apellidos',       			 $_REQUEST['Apellidos']);
            $alm->__SET('telefono',           		 $_REQUEST['telefono']);
            $alm->__SET('direccion',				 $_REQUEST['direccion']);
			$alm->__SET('correomisena', 			 $_REQUEST['correomisena']);

            $model->Registrar($alm);
            header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['identificacion']);
            header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['identificacion']);
            break;
    }
}
bththrthffrtethtgrdgfesterggry
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
							<th >identificacion</th>
                            <th >Nombres</th>
                            <th >Apellidos</th>
                            <th >telefono</th>
                            <th >direccion</th>
							<th >correomisena</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
							<td><?php echo $r->__GET('identificacion'); ?></td>
                            <td><?php echo $r->__GET('Nombres'); ?></td>
                            <td><?php echo $r->__GET('Apellidos'); ?></td>
                            <td><?php echo $r->__GET('telefono') ; ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
							<td><?php echo $r->__GET('correomisena'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>
    </body>
</html>