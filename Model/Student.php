<?php

class Student
{
    public $nombre;
    public $apellido;
    public $ciudad;
    public $fecha;
    public $correo;
    public function __construct($nombre, $apellido, $ciudad, $fecha, $correo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->ciudad = $ciudad;
        $this->correo = $correo;
        $this->fecha = $fecha;
    }
    public static function GetAll()
    {
        $StudentList = [];
        $conexion = DB::CrearInstancia();
        $sql = $conexion->query("SELECT * FROM alumno");
        foreach ($sql->fetchAll() as $student) {
            $StudentList[] = new Student($student["Nombre"], $student["Apellido"], $student["Ciudad"], $student["FechaInscripcion"], $student["Mail"]);
        }
        return $StudentList;
    }
    public static function crear($nombre, $apellido, $ciudad, $fecha, $correo)
    {
        $conexion = DB::CrearInstancia();
        $sql = $conexion->prepare("INSERT INTO alumno VALUES(?,?,?,?,?)");
        $sql->execute(array($nombre, $apellido, $ciudad, $fecha, $correo));
    }
    public static function editar($nombre, $apellido, $ciudad, $fecha, $correo, $OldApellido)
    {
        $conexion = DB::CrearInstancia();
        $sql = $conexion->prepare("UPDATE alumno SET Nombre = ?,Apellido=?,Ciudad=?,FechaInscripcion=?,Mail=? WHERE Apellido = ?");
        $sql->execute(array($nombre, $apellido, $ciudad, $fecha, $correo, $OldApellido));
    }
    public static function borrar($apellido)
    {
        $conexion = DB::CrearInstancia();
        $sql = $conexion->prepare("DELETE FROM alumno WHERE Apellido=?");
        $sql->execute(array($apellido));
    }
    public static function buscar($apellido)
    {
        $conexion = DB::CrearInstancia();
        $sql = $conexion->prepare("SELECT * FROM alumno WHERE Apellido=?");
        $sql->execute(array($apellido));
        $student = $sql->fetch();
        return new Student($student["Nombre"], $student["Apellido"], $student["Ciudad"], $student["FechaInscripcion"], $student["Mail"]);
    }
}
