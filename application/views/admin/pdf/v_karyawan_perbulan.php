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
            $this->cell(100,6,'Laporan Absensi Karyawan Perhari',0,1,'L',1); 
            $this->cell(25,6,'',0,0,'C',0); 
            $this->cell(100,6,"",0,1,'L',1); 
            $this->cell(25,6,'',0,0,'C',0); 
            $this->cell(100,6,'',0,1,'L',1); 
            // Line break
            $this->Ln(5);



        }else{
            $this->setFont('Arial','I',9);
            $this->setFillColor(255,255,255);
            $this->cell(90,6,"Laporan Data Karyawan Perhari ",0,0,'L',1); 
            $this->cell(100,6,"Printed date : " . date('d-M-Y'),0,1,'R',1); 
//            $this->Line(10,$this->GetY(),200,$this->GetY());
            $this->Ln(2);
            $this->setFont('Arial','B',9);
            $this->setFillColor(230,230,200);
			$this->cell(10,10,'No.',1,0,'C',1);
			$this->cell(30,10,'NAMA',1,0,'C',1);
			$this->cell(24,10,'GAMPONG',1,0,'C',1);
			$this->cell(24,10,'KECAMATAN',1,0,'C',1);
			$this->cell(24,10,'KABUPATEN',1,0,'C',1);
			$this->cell(24,10,'JABATAN',1,0,'C',1);
			$this->cell(33,10,'WAKTU',1,0,'C',1);
			$this->cell(24,10,'STATUS',1,1,'C',1);


        }
    }

    function Content($karyawan,$tahun,$bulan){
        $ya = 46;
        $rw = 6;
        $no = 1;
        
        $this->setFont('Arial','B',9);
        $this->setFillColor(255,255,255);
        $this->cell(20,10,'Bulan : ',0,0,'C',1);
        $this->cell(15,10,$bulan,0,0,'C',1);
        $this->cell(15,10,'Tahun : ',0,0,'C',1);
        $this->cell(15,10,$tahun,0,1,'C',1);

        $this->setFont('Arial','B',9);
        $this->setFillColor(230,230,200);
        $this->cell(10,10,'No.',1,0,'C',1);
        $this->cell(30,10,'NAMA',1,0,'C',1);
        $this->cell(24,10,'GAMPONG',1,0,'C',1);
        $this->cell(24,10,'KECAMATAN',1,0,'C',1);
        $this->cell(24,10,'KABUPATEN',1,0,'C',1);
		$this->cell(24,10,'JABATAN',1,0,'C',1);
		$this->cell(33,10,'WAKTU',1,0,'C',1);
		$this->cell(24,10,'STATUS',1,1,'C',1);



        foreach ($karyawan as $key) {
            $this->setFont('Arial','',7);
            $this->setFillColor(255,255,255);	
            $this->cell(10,10,$no,1,0,'C',1);
            $this->cell(30,10,$key->nama,1,0,'C',1);
            $this->cell(24,10,$key->gampong,1,0,'C',1);
			$this->cell(24,10,$key->kecamatan,1,0,'C',1);
            $this->cell(24,10,'Bireun',1,0,'C',1);
			$this->cell(24,10,$key->jabatan,1,0,'C',1);
            $this->cell(33,10,$key->time,1,0,'C',1);
			if($key->id_status == "1"){
				$this->cell(24,10,"Hadir",1,1,'C',1);
			}elseif($key->id_status == "2"){
				$this->cell(24,10,"Telat",1,1,'C',1);
			}elseif($key->id_status == "3"){
				$this->cell(24,10,"Izin",1,1,'C',1);
			}elseif($key->id_status == "4"){
				$this->cell(24,10,"Sakit",1,1,'C',1);
			}elseif($key->id_status == "5"){
				$this->cell(24,10,"Alpha",1,1,'C',1);
			}


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
$pdf->Content($karyawan,$tahun,$bulan);
$pdf->Output();
