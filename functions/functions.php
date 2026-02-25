<!-- creando la funcion para conectar a la base de datos -->
<?php
function conexion($host, $bd, $port, $user, $pass)
{
    try {
        $db = new PDO("mysql:dbname=$bd;host=$host;port=$port", $user, $pass);
        return $db;
    } catch (PDOException $error) {
        echo "<h2 class='alert alert-danger'>Uff!! no se pudo conectar a la base de datos, error: " . $error->getMessage() . "</h2>";
    }
}
// funcion para registrar una película en la tabla: movies
function registrarPeliculas($bd, $tabla, $datos)
{
    // recibiendo los datos por name - value
    $titulo = $datos['titulo'];
    $calificacion = $datos['calificacion'];
    $premios = $datos['premios'];
    $fechaCreacion = $datos['fechaCreacion'];
    $duracion = $datos['duracion'];
    $genero = $datos['genero'];
    $imagen = $datos['imagen'];
    // 1. insert a la bd
    $insert = "insert into $tabla (titulo, calificacion, premios, fechaCreacion, duracion, genero, imagen) values (:titulo, :calificacion, :premios, :fechaCreacion, :duracion, :genero, :imagen)";
    // 2. preparando consulta
    $query = $bd->prepare($insert);
    // o bindParams para evitar los sql injections
    $query->bindValue(':titulo', $titulo);
    $query->bindValue(':calificacion', $calificacion);
    $query->bindValue(':premios', $premios);
    $query->bindValue(':fechaCreacion', $fechaCreacion);
    $query->bindValue(':duracion', $duracion);
    $query->bindValue(':genero', $genero);
    $query->bindValue(':imagen', $imagen);
    // 3. ejecutar la consulta
    $query->execute();
    // 4. redirigimos a la siguiente página
    header('location: index.php#estrenos');

}

// función para mostrar las películas en el index
function mostrarPeliculas($bd, $tabla)
{
    // 1. consulta SQL para obtener todas las películas
    $select = "SELECT * FROM $tabla ORDER BY id DESC";

    // 2. preparar y ejecutar la consulta
    $query = $bd->prepare($select);
    $query->execute();

    // 3. obtener todos los resultados
    $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);

    // 4. retornar el array de películas
    return $peliculas;
}

// función para formatear la duración en horas y minutos (extends)
function formatearDuracion($minutos)
{
    $horas = floor($minutos / 60);
    $mins = $minutos % 60;

    if ($horas > 0) {
        return $horas . "h " . $mins . "min";
    } else {
        return $minutos . "min";
    }
}

// función para formatear la fecha (extends)
function formatearFecha($fecha)
{
    $meses = [
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    ];

    $partes = explode('-', $fecha);
    $dia = $partes[2];
    $mes = $meses[$partes[1]];
    $anio = $partes[0];

    return "$dia de $mes, $anio";
}

// función para registrar nuevos usuarios a la tabla: users
function registrarUsuario($bd, $tabla, $datos)
{
    // recibiendo los datos por name - value
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $email = $datos['email'];
    $password = password_hash($datos['password'], PASSWORD_DEFAULT);
    $perfil = $datos['perfil'];
    // 1. insert los datos a la bd
    $insert = "insert into $tabla (nombre, apellido, email, password, perfil) values (:nombre, :apellido, :email, :password, :perfil)";
    // var_dump($insert);
    // exit;
    // 2. preparando consulta
    $query = $bd->prepare($insert);
    // o bindParams para evitar los sql injections
    $query->bindValue(':nombre', $nombre);
    $query->bindValue(':apellido', $apellido);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $query->bindValue(':perfil', $perfil);
    // 3. ejecutar la consulta
    $query->execute();
    // 4. redirigimos al usuario a la siguiente página acá o en el archivo php
    // header('location: iniciarSesion.php');
}

function validarRegistro($datos)
{
    $errores = [];
    $camposObligatorios = [
        'nombre' => '<i class="bi bi-asterisk"></i> El campo nombre no puede estar vacío',
        'apellido' => '<i class="bi bi-asterisk"></i> El campo apellido no puede estar vacío',
        // 'email'    => '<i class="bi bi-asterisk"></i> El campo correo electrónico no puede estar vacío',
        // 'password' => '<i class="bi bi-asterisk"></i> El campo contraseña no puede estar vacío',
        'perfil' => '<i class="bi bi-asterisk"></i> El campo perfil no puede estar vacío',
    ];

    foreach ($camposObligatorios as $campo => $mensaje) {
        if (empty($datos[$campo])) {
            $errores[$campo] = $mensaje;
        }
    }

    // validamos email
    $errorEmail = validarEmail($datos["email"] ?? "");
    if ($errorEmail) {
        $errores["email"] = $errorEmail;
    }
    // validamos password
    $errorPass = validarPassword($datos["password"] ?? "");
    if ($errorPass) {
        $errores["password"] = $errorPass;
    }

    return $errores;
}
function validarEmail($email)
{
    if (empty($email))
        return '<i class="bi bi-asterisk"></i> El email es obligatorio';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return '<span class="text-warning"><i class="bi bi-exclamation-triangle-fill"></i> El formato del correo no es válido</span>';
    }
    return null;
}

function validarPassword($password)
{
    if (empty($password)) {
        return '<i class="bi bi-asterisk"></i> El campo contraseña no puede estar vacío';
    } else if (strlen($password) < 8) {
        return '<span class="text-warning"><i class="bi bi-exclamation-triangle-fill"></i> El campo contraseña debe tener al menos 8 caracteres</span>';
    }
    return null;
}

function validarLogin($datos)
{
    $errores = [];
    $camposObligatorios = [
        'email' => 'El campo email no lo puede dejar vacío',
        'password' => 'El campo password no puede estar vacío'
    ];
    foreach ($camposObligatorios as $campo => $mensaje) {
        if (empty($datos[$campo])) {
            $errores[$campo] = $mensaje;
        }
    }
    return $errores;
}
// funcion para validar si existe el email del usuario dentro de la BD
function buscarPorEmail($bd, $tabla, $email)
{
    $selectOne = "select * from $tabla where email = :email";
    $query = $bd->prepare($selectOne);
    $query->bindValue(":email", $email);
    $query->execute();
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    return $usuario;
}

function mensajeAlertFlash(){
    // Definimos la configuración de cada tipo de alerta
    $config = [
        'registro_exitoso' => ['clase' => 'success', 'icono' => 'bi-check-circle-fill'],
        'cerrar_sesion_exitoso' => ['clase' => 'success', 'icono' => 'bi-check-circle-fill'],
    ];
    foreach ($config as $llave => $estilo) {
        if (isset($_SESSION[$llave])) {
            echo "
            <div class='alert alert-{$estilo['clase']} alert-dismissible fade show ps-5' role='alert'>
                <i class='bi {$estilo['icono']} me-2'></i>
                {$_SESSION[$llave]}
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            
            // Eliminamos el mensaje tras mostrarlo
            unset($_SESSION[$llave]);
        }
    }
}