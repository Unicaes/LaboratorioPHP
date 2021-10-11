<?php
include_once("Model/Student.php");
include_once("conexion.php");
class Students_controller
{
    public function inicio()
    {
        $Alumnos = Student::GetAll();
        include_once("View/StudentList.php");
    }
    public function crear()
    {
        if ($_POST) {
            $nombre = $_POST["txtNombre"];
            $apellido = $_POST["txtApellido"];
            $ciudad = $_POST["txtCiudad"];
            $fecha = $_POST["txtFecha"];
            $correo = $_POST["txtMail"];
            Student::crear($nombre, $apellido, $ciudad, $fecha, $correo);
            echo "<script>
            Swal.fire('Creacion con exito');
            </script>";
            $Alumnos = Student::GetAll();
            include_once("View/StudentList.php");
            // header("Location:./?action=inicio");
        } else {
            include_once("View/Add.php");
        }
    }
    public function editar()
    {
        if ($_POST) {
            $nombre = $_POST["txtNombre"];
            $apellido = $_POST["txtApellido"];
            $ciudad = $_POST["txtCiudad"];
            $fecha = $_POST["txtFecha"];
            $correo = $_POST["txtMail"];
            $old = $_POST["txtOld"];
            Student::editar($nombre, $apellido, $ciudad, $fecha, $correo, $old);
            echo "<script>
            Swal.fire('Modificacion Exitosa');
            </script>";
            $Alumnos = Student::GetAll();
            include_once("View/StudentList.php");
        } else {
            $alumno = Student::buscar($_GET["apellido"]);
            include_once("View/Modify.php");
        }
    }
    public function borrar()
    {
        Student::borrar($_GET["apellido"]);
        echo "<script>
            Swal.fire('Registro eliminado');
            </script>";
        // header("Location:./?action=inicio");
        $Alumnos = Student::GetAll();
        include_once("View/StudentList.php");
    }
    public function pdf()
    {
    }
    public function Login()
    {
        if ($_POST) {
            $user = $_POST['txtUser'];
            $pass = $_POST['txtPass'];
            $resp = DB::CrearInstancia($user, $pass);
            if ($resp == false) {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Usuario o contraseña incorrecta!'
                  });
                </script>";
                include_once("View/Login.php");
            } else {
                header("Location:./?action=inicio");
            }
        } else {
            include_once("View/Login.php");
        }
    }
}
