<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once "application/third_party/TCPDF/tcpdf.php";


class Pdf extends TCPDF
{
    public function __construct()
    {
        parent::__construct();
    }
    public function Header()
    {
        // Logo
        $image_file = 'imgs/company_header.jpg';
        $this->Image($image_file, 12, 1, 180, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('msungstdlight', 'B', 20);
        // //Title
        // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        // $this->SetY(-15);
        // Set font
        $this->SetFont('msungstdlight', '', 11);
        // Page number

        $pageNumbers = '本合約共'.$this->getAliasNbPages().'頁，此為第'.$this->getAliasNumPage().'頁，第'.$this->getAliasNbPages().'頁為合約附帶條款及雙方簽名處';

        $this->Cell(0, 0, $pageNumbers, 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}
