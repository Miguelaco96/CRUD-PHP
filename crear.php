<?php include "conexion.php" ?>

<?php
$error ='';
if (isset($_POST["crearRegistro"])) {

    $nombre = ($_POST["nombre"]);
    $apellido = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    date_default_timezone_set('Atlantic/Canary');
    $time = date('h:i:s a');

//Validacion de vacio

if (
    !isset($nombre) || !isset($apellido) || !isset($telefono) || !isset($email)
    || $nombre == "" || $apellido == "" || $telefono == "" || $email == ""
) {

    $error = "Algunos campos estan vacios";

} else {
    $query = "INSERT INTO usuario(nombre, apellido, telefono, email) VALUE ('$nombre','$apellido','$telefono','$email')";

    if (!mysqli_query($con, $query)) {


        $error = "No se pudo realizar el registro";

        die('Error: ' . mysqli_error($con));

    }

    $mensaje = "registro creado correctamente";

    header("Location: http://localhost/CRUD_PHP/index.php?mensaje= '$mensaje'");

    exit();
}
}
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet">

    <title>CRUD PHP Y MYSQL</title>
</head>

<body>
    <h1 class="text-center">CRUD PHP Y MYSQL</h1>
    <p class="text-center">Aprende a realizar las 4 operaciones básicas entre PHP y una base de datos, en este caso
        MYSQL: CRUD(Create, Read, Update, Delete)</p>

    <div class="container">

        <div class="row">
            <h4>Crear un Nuevo Registro</h4>
            <?php if ($error!=''): ?>

                <h4 class='bg-danger text-white'>
                    <?php echo $error ?>
                </h4>

            <?php endif; ?>

        <div class="row caja">

            <div class="col-sm-6 offset-3">
                <form method="POST" action=<?php $_SERVER["PHP_SELF"]; ?>>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre">
                    </div>

                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Ingresa los apellidos">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono:</label>
                        <input type="number" class="form-control" name="telefono" placeholder="Ingresa el teléfono">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingresa el email">
                    </div>

                    <button type="submit" class="btn btn-primary w-100" name="crearRegistro">Crear Registro</button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>