<?php 
require('fpdf/fpdf.php');
require('Db/conexion.php');

class PDF extends FPDF
{

// Cabecera de página
function Header()
{
    $this->SetFont('Times','B',20);// 
    $this->setXY(70,20);
    $this->Cell(74,8, 'Reportes de Clientes',3,0,'C',0);
    $this->SetTitle ('Reporte');
    $this->setXY(70,30);
    $this->Cell(74,8, 'GameWorld',3,0,'C',0);
    $this->ln(20);
}

// Pie de página
function Footer()
{
       // Posición: a 1,5 cm del final
       $this->SetY(-15);
       // Arial italic 8
       $this->SetFont('Arial','B',8);
       // Número de página
       $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,1,'C');
      
       $this->Cell(0,1,'Derechos Reservados a "GameWorld" ',0,0,'C');
      
       $this->SetXY(-10,-15);
       $this->Cell(1,10,date("d-m-Y"),0,0,"C");
}
}
/**********************************************************/
class PDF_MC_Table extends FPDF
{
    protected $widths;
    protected $aligns;

    function SetWidths($w)
    {
        // Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        // Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data,$setX)
    {
        // Calculate the height of the row
        $nb = 0;
        for($i=0;$i<count($data);$i++)
            $nb = max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h = 5*$nb;
        // Issue a page break first if needed
        $this->CheckPageBreak($h,$setX);
        // Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
            // Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            // Draw the border
            $this->Rect($x,$y,$w,$h,'DF');
            // Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            // Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        // Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        // If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        // Compute the number of lines a MultiCell of width w will take
        if(!isset($this->CurrentFont))
            $this->Error('No font has been set');
        $cw = $this->CurrentFont['cw'];
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
        $s = str_replace("\r",'',(string)$txt);
        $nb = strlen($s);
        if($nb>0 && $s[$nb-1]=="\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while($i<$nb)
        {
            $c = $s[$i];
            if($c=="\n")
            {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep = $i;
            $l += $cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i = $sep+1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
}

//************************************************************************************ */
$sql = "SELECT * FROM cliente";
$resultado = $mysqli->query($sql);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(10,10,10); // Margenes 
$pdf->SetAutoPageBreak(true,20);

$pdf->Ln(5);
$pdf->SetX(10);
$pdf->SetFont('Helvetica','B',12);
$pdf->SetFillColor(61, 61, 61); /*26, 95, 122*/ /* 201, 219, 178*/ 
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(10,7,'ID',1,0,'C',1); 
$pdf->SetTextColor(61, 61, 61);
$pdf->SetFillColor(170, 200, 167); /*87, 197, 182*/
$pdf->Cell(35,7,'nombre',1,0,'C',1);
$pdf->Cell(35,7, 'usuario',1,0,'C',1);
$pdf->Cell(35,7,utf8_decode('contraseña'),1,0,'C',1);
$pdf->Cell(35,7,'correo',1,0,'C',1);
$pdf->Cell(35,7,'telefono',1,1,'C',1);




/*$pdf->SetFillColor(155, 164, 181); // Color de Fondo RGB*/

$pdf->SetDrawColor(61, 61, 61); // Color de Linea RGB

$pdf->Ln(0.5);

$pdf->SetFont('Times','',12);
// El anco de las celdas 
//$pdf->SetWidths(array(10, 35, 35, 35, 35, 35));
///$pdf->Row(array('id',utf8_decode('Marca'), 'Modelo', 'Año', 'Placa','Color'),30);

while($fila = $resultado->fetch_assoc()){
    $pdf->SetX(10);
    $pdf->SetFillColor(201, 219, 178); 
    $pdf->Cell(10,7,$fila['id_cliente'],1,0,'C',1);
    $pdf->SetFillColor(246, 255, 222); // Color de Fondo RGB
    $pdf->Cell(35,7,$fila['nombre'],1,0,'C',1);
    $pdf->Cell(35,7,$fila['usuario'],1,0,'C',1);
    $pdf->Cell(35,7,$fila['contraseña'],1,0,'C',1);
    $pdf->Cell(35,7,$fila['telefono'],1,0,'C',1);
    $pdf->Cell(35,7,$fila['telefono'],1,1,'C',1);


    /*$pdf->Cell(35,7,$fila['Color'],1,1,'C',1);*/
}




$pdf->Ln(10);


   $pdf->AddPage();

$pdf->Output('I', 'Reporte.pdf');

?>