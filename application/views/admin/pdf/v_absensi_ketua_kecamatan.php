<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PDF extends FPDF{
    // Page header
    function Header(){
        if ($this->PageNo() == 1){
            $this->setFont('Arial','I',9);
            $this->setFillColor(255,255,255);
            $this->cell(90,6,'',0,0,'L',1); 
            $this->cell(100,6,"Printed date : " . date('d-M-Y'),0,1,'R',1); 
            $this->Line(10,$this->GetY(),200,$this->GetY());
            // Logo
            $this->Image(base_url().'assets/image/mub.jpg', 10, 17,'30','30','jpg');
            $this->Ln(12);
            $this->setFont('Arial','',14);
            $this->setFillColor(255,255,255);
            $this->cell(25,6,'',0,0,'C',0); 
            $this->cell(100,6,'Laporan Data Kehadiran Ketua Kecamatan',0,1,'L',1); 
            $this->cell(25,6,'',0,0,'C',0); 
            $this->cell(100,6,"",0,1,'L',1); 
            $this->cell(25,6,'',0,0,'C',0); 
            $this->cell(100,6,'',0,1,'L',1); 
            // Line break
            $this->Ln(5);
			$this->setFont('Arial','B',9);
            $this->setFillColor(230,230,200);
			$this->cell(10,10,'No.',1,0,'C',1);
            $this->cell(15,10,'ID',1,0,'C',1);
            $this->cell(99,10,'KECAMATAN',1,0,'C',1);
            $this->cell(24,10,'JAM',1,0,'C',1);
            $this->cell(49,10,'TANGGAL',1,1,'C',1);

        }else{
            $this->setFont('Arial','I',9);
            $this->setFillColor(255,255,255);
            $this->cell(90,6,'Laporan Data Kehadiran Ketua Kecamatan',0,1,'L',1); 
            $this->cell(100,6,"Printed date : " . date('d-M-Y'),0,1,'R',1); 
//            $this->Line(10,$this->GetY(),200,$this->GetY());
            $this->Ln(2);
            $this->setFont('Arial','B',9);
            $this->setFillColor(230,230,200);
			$this->cell(10,10,'No.',1,0,'C',1);
            $this->cell(15,10,'ID',1,0,'C',1);
            $this->cell(99,10,'KECAMATAN',1,0,'C',1);
            $this->cell(24,10,'JAM',1,0,'C',1);
            $this->cell(49,10,'TANGGAL',1,1,'C',1);
        }
    }

    function Content($kehadiran){
        $ya = 46;
        $rw = 6;
        $no = 1;
        foreach ($kehadiran as $key) {
            $this->setFont('Arial','',7);
            $this->setFillColor(255,255,255);	
            $this->cell(10,10,$no,1,0,'C',1);
            $this->cell(15,10,$key->id_ketua_kecamatan,1,0,'C',1);
            $this->cell(99,10,$key->nama,1,0,'C',1);
            $this->cell(24,10,$key->jam,1,0,'C',1);
            $this->cell(49,10,$key->tanggal,1,1,'C',1);
            $ya = $ya + $rw;
            $no++;
            
        }            
    }

    // Page footer
    function Footer(){
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        //buat garis horizontal
        $this->Line(10,$this->GetY(),200,$this->GetY());
        //Arial italic 9
        $this->SetFont('Arial','I',9);
        $this->Cell(0,10,'Copyright@'.date('Y').' FA',0,0,'L');
        //nomor halaman
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
//    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Content($kehadiran);
$pdf->Output();

