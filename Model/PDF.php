<?php
require('../fpdf/fpdf.php');
require('../Model/Student.php');
require('../conexion.php');
class PDF extends FPDF
{
    function Header()
    {
        // $this->Image('471px-UNICAES_Logo.png', 170, 5, 25);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(60);
        $this->Cell(80, 10, 'Listado Alumnos', 1, 0, 'C');
        $this->Ln();
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina # ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    function headerTable()
    {
        $this->Ln();
        $this->Cell(40, 10, 'Nombre', 1, 0, 'C');
        $this->Cell(40, 10, 'Apellido', 1, 0, 'C');
        $this->Cell(40, 10, 'Ciudad', 1, 0, 'C');
        $this->Cell(40, 10, 'Fecha Inscripcion', 1, 0, 'C');
        $this->Cell(75, 10, 'Correo', 1, 0, 'C');
        $this->Ln();
    }
    function LoadData($Alumnos)
    {
        foreach ($Alumnos as $alumno) {
            $this->Cell(40, 10, $alumno->nombre, 1, 0, 'C');
            $this->Cell(40, 10, $alumno->apellido, 1, 0, 'C');
            $this->Cell(40, 10, $alumno->ciudad, 1, 0, 'C');
            $this->Cell(40, 10, $alumno->fecha, 1, 0, 'C');
            $this->Cell(75, 10, $alumno->correo, 1, 0, 'C');
            $this->Ln();
        }
    }
}
ob_start();
$Alumnos = Student::GetAll();
$fpdf = new PDF();
$fpdf->AliasNbPages();
$fpdf->AddPage('horizontal');
$fpdf->SetTitle('Laboratorio 1');
$fpdf->SetAuthor('Bryan Mauricio Palma Flores');
$fpdf->headerTable();
$fpdf->LoadData($Alumnos);
// echo 'HolaMundo';
// return;
$fpdf->Output('', 'LaboratorioBryanPalma.pdf');
ob_end_flush();
