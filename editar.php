
<?php include "conexion.php"?>




<?php 


$id_registro = $_GET['id'];

$query ="SELECT * FROM usuario where id='$id_registro'";

$usuario_update = mysqli_query($con,$query) or die(mysqli_error($con));


$fila = mysqli_fetch_assoc($usuario_update);




?>

<?php
if(isset($_POST["editarRegistro"])){

    $nombre= ($_POST["nombre"]);
    $apellido =$_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    date_default_timezone_set('Atlantic/Canary');
    $time = date('h:i:s a');
}
    //Validacion de vacio
    
    if(!isset($nombre)||!isset($apellido)||!isset($telefono)||!isset($email)
    ||$nombre ==""|| $apellido == ""|| $telefono == ""|| $email == ""){
        $error ="Algunos campos estan vacios";
    }else{
        $query ="UPDATE usuario set nombre = '$nombre', apellido = '$apellido',telefono= '$telefono',email = '$email' WHERE id= $id_registro";

        mysqli_query($con,$query) or die(mysqli_error($con));
           if(!mysqli_query($con,$query)){
            die('Error: '.mysqli_error($con));
            
            $error = "No se pudo realizar el registro";


        }

        $mensaje = "registro actualizado correctamente";

        header("Location: http://localhost/CRUD_PHP/index.php?mensaje=".urlencode($mensaje));


        exit();
    }
?>

<!doctype html>

<html lang="es">

  <head>
    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet">

    <title>CRUD PHP Y MYSQL</title>

  </head>

  <body>

    <h1 class="text-center">CRUD PHP Y MYSQL</h1>
    
    <div class="container">

    <div class="row">

        <h4>Editar un Registro Existente</h4>

    </div>

        <div class="row caja">
            <div class="col-sm-6 offset-3">
            <form method="POST">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value = "<?php echo $fila["nombre"] ?>" placeholder="Ingresa el nombre">                    
                </div>
                
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" value = "<?php echo $fila["apellido"] ?>" placeholder="Ingresa los apellidos">                    
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" value = "<?php echo $fila["telefono"] ?>"  placeholder="Ingresa el teléfono">                    
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value = "<?php echo $fila["email"] ?>"  placeholder="Ingresa el email">                    
                </div>
              
                <button type="submit" class="btn btn-primary w-100" name="editarRegistro">Editar Registro</button>


                </form>
            </div>
        </div>
    </div>
  </body>
</html>