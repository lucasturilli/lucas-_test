<?php

if (!defined('BASEPATH')) {
    exit('Acceso no autorizado');
}

class Contacto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library('email');
        $this->load->library('parser');
        $this->load->library('form_validation');
    }

//carga formulario de contacto
    public function index() {

        if ($this->input->post()) {
            $datos = array(
                'txtNombre' => $this->input->post('txtNombre'),
                'emailCorreo' => $this->input->post('emailCorreo'),
                'txtAsunto' => $this->input->post('txtAsunto'),
                'txtareaMensaje' => $this->input->post('txtareaMensaje')
            );
        } else {
            $datos = array(
                'txtNombre' => '',
                'emailCorreo' => '',
                'txtAsunto' => '',
                'txtareaMensaje' => ''
            );
        }

        $datos['titulo'] = 'Contáctanos';
        $datos['subtitulo'] = '';

        $this->load->view('/templates/adminlte/contacto/header', $datos);
        $this->load->view('/templates/adminlte/contacto/menu');
        $this->load->view('/templates/adminlte/contacto/contenido', $datos);
        $this->load->view('/templates/adminlte/contacto/footer');
    }

    public function enviar() {

        $this->form_validation->set_rules('txtNombre', 'Nombre', 'required|trim|max_length[200]');
        $this->form_validation->set_rules('emailCorreo', 'Correo', 'required|trim|valid_email|max_length[200]');
        $this->form_validation->set_rules('txtAsunto', 'Asunto', 'required|trim|max_length[200]');
        $this->form_validation->set_rules('txtareaMensaje', 'Mensaje', 'required|trim');
        if (!$this->form_validation->run()) {
            $this->index();
        } else {
            $this->email->clear();
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'in-v3.mailjet.com';
            $config['smtp_port'] = '25';
            $config['smtp_user'] = '6152204fc76b77257daf65de470bda3d';
            $config['smtp_pass'] = '1590e6a80c567446990a14ff30ae2352';
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");

            $this->email->from('correo', 'password');
            $this->email->to('correo');

            $datos = array(
                'nombre' => $this->input->post('txtNombre'),
                'correo' => $this->input->post('emailCorreo'),
                'asunto' => $this->input->post('txtAsunto'),
                'mensaje' => $this->input->post('txtareaMensaje')
            );

            $cuerpoMensaje = $this->parser->parse('/templates/adminlte/contacto/plantillacorreo', $datos, true);

            $this->email->subject('Formulario de contacto');
            $this->email->message('Holamundo');

            if ($this->email->send()) {
                redirect(base_url() . 'index.php/contacto/enviado', 'refresh');
                echo $this->email->print_debugger();
            } else {
                echo 'Se ha producido un error interno.';
            }
        }
    }

    public function enviado() {
        $this->load->view('/templates/adminlte/contacto/enviado');
    }

}

?>