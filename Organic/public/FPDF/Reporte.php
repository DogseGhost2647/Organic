<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include '../../app/Models/conexion.php';//llamamos a la conexion BD

      $consulta_info = $conexion->query(" select *from productos ");//traemos datos de la empresa desde BD
      $dato_info = $consulta_info->fetch_object();
      $this->Image('logo.png', 5, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(20); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(30, 10, utf8_decode('O-rganic'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION 
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, '', 0);
      $this->Ln(5);

      TELEFONO 
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
      $this->Ln(5);

      COREEO 
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      $this->Ln(5);

      TELEFONO 
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      $this->Ln(10);*/

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor( 0, 0, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE PRODUCTOS"), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(0, 0, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(35, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(45, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Stock'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Estado'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include '../../app/Models/conexion.php';//llamamos a la conexion BD

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(0, 0, 0); //colorBorde

$consulta_reporte_productos = $conexion->query("
   SELECT id, nombre, precio, cantidad_disponible, estado
   FROM productos
   ");

while ($datos_reporte = $consulta_reporte_productos->fetch_object()) {      
   $i = $i + 1;
   /* TABLA */
   $pdf->Cell(35, 10, utf8_decode($datos_reporte->id), 1, 0, 'C', 0);
   $pdf->Cell(45, 10, utf8_decode($datos_reporte->nombre), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos_reporte->precio), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos_reporte->cantidad_disponible), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->estado), 1, 0, 'C', 0);

   $pdf->Ln(); //salto de pagina desp de cada iteración
   }

ob_clean(); // Limpia cualquier salida previa
$pdf->Output('Reporte productos.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
