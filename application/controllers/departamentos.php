<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Departamentos extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('mpdf');
 
    }
 
    public function index()
    {
        $this->grocery_crud->set_table('departamentos');
        $output=$this->grocery_crud->render();
        $output->titulo='Departamentos';
        $output->subtitulo='Gestione sus departamentos';

        $datosHeader['titulo']='Departamentos';
        $this->load->view('/templates/adminlte/header', $output);
        $this->load->view('/templates/adminlte/menu');
        $this->load->view('/templates/adminlte/contenido',$output);
        $this->load->view('/templates/adminlte/footer', $output);        
    }

}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */