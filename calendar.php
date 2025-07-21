<?php

// incluido archivo de conexion para conectar la base de datos
include 'connection.php';

$success = '';
$error = '';
$eventsFromDB = []; // almacenar los eventos de la consulta

// añadir nuevas citas

// validar el metodo de la peticion realizada // si es POST valida que el atributo `action` contenga el valor `add`
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add') {
    $instructor = trim($_POST['instructor_name'] ?? '');
    $course = trim($_POST['course_name'] ?? '');
    $start = $_POST['start_date'] ?? '';
    $end = $_POST['end_date'] ?? '';

    if ($instructor && $course && $start && $end) {
        $statement = $connection->prepare(
            'INSERT INTO appoinments (course_name, instructor, start_date, end_date) values (?, ?, ?, ?)'
        );

        $statement->bind_param($course, $instructor, $start, $end); // valores a insertar
        $statement->execute(); // ejecutar la consulta
        $statement->close(); // cerrar la declaracion

        header('Location: ' . $_SERVER['PHP_SELF'] . '?success=1');
        exit;
    } else {
        header('Location: ' . $_SERVER['PHP_SELF'] . '?error=1');
    }
}

// editar citas

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') == 'edit') {
    $id = $_POST['event_id'] ?? null;

    $instructor = trim($_POST['instructor_name'] ?? '');
    $course = trim($_POST['course_name'] ?? '');
    $start = $_POST['start_date'] ?? '';
    $end = $_POST['end_date'] ?? '';

    if ($id && $instructor && $course && $start && $end) {
        $statement = $connection->prepare(
            'UPDATE appoinments SET course_name = ?, instructor = ?, start_date = ?, end_date = ? WHERE id = ?'
        );

        $statement->bind_param('ssssi', $course, $instructor, $start, $end);
        $statement->execute();
        $statement->close();

        header('Location: ' . $_SERVER['PHP_SELF'] . '?success=2');
        exit;
    } else {
        header('Location: ' . $_SERVER['PHP_SELF'] . '?error=2');
    }
}


// eliminar citas

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    $id = $_POST['event_id'] ?? null;

    if ($id) {
        $statement = $connection->prepare(
            'DELETE FROM appoinments WHERE id = ?'
        );

        $statement->bind_param('i', $id);
        $statement->execute();
        $statement->close();

        header('Location: ' . $_SERVER['PHP_SELF'] . '?success=3');
        exit;
    } else {
        header('Location: ' . $_SERVER['PHP_SELF'] . '?error=3');
    }
}

// mensajes de error y exito
if (isset($_GET['success'])) {
    $success = match ($_GET['success']) {
        '1' => 'Appoinment created successfully',
        '2' => 'Appoinment edited successfully',
        '3' => 'Appoinment deleted successfully',
        default => ''
    };
} else {
    $error = 'Error occured, please try again';
}
