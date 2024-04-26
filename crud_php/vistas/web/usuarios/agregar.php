<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AGREGAR USUARIO</title>
        <style type="text/css">
            th {
                text-align: right;
            }
        </style>   
    </head>

    <body>
        <center>
            <h2>AGREGAR USUARIO</h2>
            <hr />
            <form method="post" action="../../../controladores/ControladorUsuario.php">
                <fieldset style="width: 35%;">
                    <table>
                        <tr>
                            <th>CEDULA</th>
                            <td>
                                <input type="number" name="cc" id="cc"
                                require placeholder="INGRESE LA CEDULA">
                            </td>
                        </tr>
                        <tr>
                            <th>CLAVE</th>
                        <td>
                                <input type="password" name="pass" id="pass"
                                require placeholder="INGRESE LA CLAVE">
                            </td>
                        </tr>
                        <tr>
                            <th>NOMBRE</th>
                        <td>
                                <input type="text" name="nombre" id="nombre"
                                require placeholder="INGRESE EL NOMBRE">
                            </td>
                        </tr>
                        <tr>
                            <th>APELLIDO</th>
                        <td>
                                <input type="text" name="apellido" id="apellido"
                                require placeholder="INGRESE EL APELLIDO">
                            </td>
                        </tr>
                        <tr>
                            <th>EMAIL</th>
                        <td>
                                <input type="email" name="email" id="email"
                                require placeholder="INGRESE EL EMAIL">
                            </td>
                        </tr>
                        <tr>
                            <th>TELEFONO</th>
                        <td>
                                <input type="number" name="telefono" id="telefono"
                                require placeholder="INGRESE EL TELEFONO">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">
                                <input type="reset" value="LIMPIAR">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" value="GUARDAR" name="accion">
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
            <hr>
            <span style="color:red;"><?= @$_REQUEST['msj']?></span>
        </center>
    </body>
</html>