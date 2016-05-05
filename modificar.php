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
            $alm->__SET('identificacion',                $_REQUEST['identificacion']);
            $alm->__SET('Nombres',          			 $_REQUEST['Nombres']);
            $alm->__SET('Apellidos',      			     $_REQUEST['Apellidos']);
            $alm->__SET('telefono',            			 $_REQUEST['telefono']);
            $alm->__SET('direccion', 					 $_REQUEST['direccion']);
			$alm->__SET('correomisena',					 $_REQUEST['correomisena']);

            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
            $alm->__SET('identificacion',              $_REQUEST['identificacion']);
            $alm->__SET('Nombres',          			 $_REQUEST['Nombres']);
            $alm->__SET('Apellidos',      			     $_REQUEST['Apellidos']);
            $alm->__SET('telefono',            			 $_REQUEST['telefono']);
            $alm->__SET('direccion', 					 $_REQUEST['direccion']);
			$alm->__SET('correomisena',					 $_REQUEST['correomisena']);
			
            $model->Registrar($alm);
            header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['identificacion']);
            header('Location: eliminar.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['identificacion']);
            break;
    }
}

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
                
                <form action="?action=<?php echo $alm->identificacion > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="identificacion" value="<?php echo $alm->__GET('identificacion'); ?>" />
                   
                    <table >
						
                       <tr>
                            <th >Nombres</th>
                            <td><input type="text" name="Nombres" value="<?php echo $alm->__GET('Nombres'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Apellidos</th>
                            <td><input type="text" name="Apellidos" value="<?php echo $alm->__GET('Apellidos'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >telefono</th>
                                <td><input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >direccion</th>
                            <td><input type="text" name="direccion" value="<?php echo $alm->__GET('direccion'); ?>"  /></td>
                        </tr>
						 <tr>
                            <th >correomisena</th>
                            <td><input type="text" name="correomisena" value="<?php echo $alm->__GET('correomisena'); ?>"  /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
						    <th >identificacion</th>
                            <th >Nombres</th>
                            <th >Apellidos</th>
                            <th >telefono</th>
                            <th >direccion</th>
							<th >correomisena</th>
                            <th ></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
						    <td><?php echo $r->__GET('identificacion'); ?></td>
                            <td><?php echo $r->__GET('Nombres'); ?></td>
                            <td><?php echo $r->__GET('Apellidos'); ?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
							<td><?php echo $r->__GET('correomisena'); ?></td>
                            <td>
                                <a href="?action=editar&identificacion=<?php echo $r->identificacion; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&identificacion=<?php echo $r->identificacion; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>