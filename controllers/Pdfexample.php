<?php

class pdfexample extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Pdf Example');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        
        
        $pdf->Cell(0, 0, 'TEST CELL STRETCH: no stretch', 1, 1, 'C', 0, '', 0);
        $pdf->Cell(0, 0, 'TEST CELL STRETCH: scaling', 1, 1, 'C', 0, '', 1);
        $pdf->Cell(0, 0, 'TEST CELL STRETCH: force scaling', 1, 1, 'C', 0, '', 2);
        $pdf->Cell(0, 0, 'TEST CELL STRETCH: spacing', 1, 1, 'C', 0, '', 3);
        $pdf->Cell(0, 0, 'TEST CELL STRETCH: force spacing', 1, 1, 'C', 0, '', 4);

        $pdf->Ln(5);

        $pdf->Cell(45, 0, 'TEST CELL STRETCH: scaling', 1, 1, 'C', 0, '', 1);
        $pdf->Cell(45, 0, 'TEST CELL STRETCH: force scaling', 1, 1, 'C', 0, '', 2);
        $pdf->Cell(45, 0, 'TEST CELL STRETCH: spacing', 1, 1, 'C', 0, '', 3);
        $pdf->Cell(45, 0, 'TEST CELL STRETCH: force spacing', 1, 1, 'C', 0, '', 4);

        $pdf->AddPage();

// example using general stretching and spacing

        for ($stretching = 90; $stretching <= 110; $stretching += 10) {
            for ($spacing = -0.254; $spacing <= 0.254; $spacing += 0.254) {

                // set general stretching (scaling) value
                $pdf->setFontStretching($stretching);

                // set general spacing value
                $pdf->setFontSpacing($spacing);

                $pdf->Cell(0, 0, 'Stretching ' . $stretching . '%, Spacing ' . sprintf('%+.3F', $spacing) . 'mm, no stretch', 1, 1, 'C', 0, '', 0);
                $pdf->Cell(0, 0, 'Stretching ' . $stretching . '%, Spacing ' . sprintf('%+.3F', $spacing) . 'mm, scaling', 1, 1, 'C', 0, '', 1);
                $pdf->Cell(0, 0, 'Stretching ' . $stretching . '%, Spacing ' . sprintf('%+.3F', $spacing) . 'mm, force scaling', 1, 1, 'C', 0, '', 2);
                $pdf->Cell(0, 0, 'Stretching ' . $stretching . '%, Spacing ' . sprintf('%+.3F', $spacing) . 'mm, spacing', 1, 1, 'C', 0, '', 3);
                $pdf->Cell(0, 0, 'Stretching ' . $stretching . '%, Spacing ' . sprintf('%+.3F', $spacing) . 'mm, force spacing', 1, 1, 'C', 0, '', 4);

                $pdf->Ln(2);
            }
        }
        //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
        $pdf->Output('pdfexamples.pdf', 'I');
    }

}

?>