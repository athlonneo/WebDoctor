<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/fpdf/fpdf.php";

    class PDFController{
		protected $db;

        public function __construct(){
            $this->db = new MySQLDB ("localhost", "root", "", "webdoctor");
        }

        public function createPDF(){
            $query = "SELECT city.name, COUNT(idU) AS jumlah FROM user JOIN city ON user.idC=city.idC GROUP BY city.name";
			$data = $this->db->executeSelectQuery($query);

            $title = "User Count in Each City";
            $header = array(
                array("label"=>"City", "length"=>30, "align"=>"C"),
                array("label"=>"User Count", "length"=>30, "align"=>"C")
            );

            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B','16');
            $pdf->Cell(0,20,$title,'0',1,'C');
            
            $pdf->SetFont('Arial','','12');
            $pdf->SetFillColor(0,127,255);
            $pdf->SetTextColor(255);
            $pdf->SetDrawColor(0);
            foreach($header as $row){
                $pdf->Cell($row['length'], 5, $row['label'], 1,'0', $row['align'], true);
            }
            $pdf->Ln();

            $pdf->SetFillColor(255);
            $pdf->SetTextColor(0);
            foreach($data as $row){
                $i = 1;
                foreach($row as $cell){
                    $pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', 'C', true);
                }
                $pdf->Ln();
            }

            $pdf->Output();
        }
    }
?>