<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once dirname(__FILE__) . '/tcpdf/tcpdf/tcpdf.php';
class inv_pdf extends TCPDF
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }
}
