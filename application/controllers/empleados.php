<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Empleados extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
 
    }
 
    public function index()
    {
        $this->grocery_crud->set_table('empleados');
        $output=$this->grocery_crud->render();
        $output->titulo='Empleados';
        $output->subtitulo='Gestione sus empleados';

        $datosHeader['titulo']='Empleados';
        $this->load->view('/templates/adminlte/header', $output);
        $this->load->view('/templates/adminlte/menu');
        $this->load->view('/templates/adminlte/contenido',$output);
        $this->load->view('/templates/adminlte/footer', $output);        
    }

    public function listapdf(){
        $this->load->library('mpdf');
        $this->grocery_crud->set_table('empleados');
        $output=$this->grocery_crud->render();
        //$pdf=new mPDF();
        $html=$this->load->view('/templates/adminlte/contenido',$output, true);
        //$html=$this->load->view('/templates/mpdf/listaempleados', $data, true);
        $pdfFilePath = "output_pdf_name.pdf";
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output($pdfFilePath, "I");
    }

}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */