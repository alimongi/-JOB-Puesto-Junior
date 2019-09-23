<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pruebas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('unit_test');
	}

	function prueba()
	{
		$query = $this->db->get('notas');
		return $query->result_array();
	}

	function prueba2()
	{
		$query = $this->db->get('favoritas');
		return $query->result_array();
	}

	public function index()
	{
		$nombre = 'Prueba Consulta de Notas';
		$datos['prueba'] = $this->unit->run($this->prueba(),'is_array',$nombre,'Prueba de la consulta de notas, verifica si es un arreglo lo que trae la consulta a la tabla nostas');
		$nombre2 = 'Prueba Consulta de Notas Favoritas';
		$datos['prueba2'] = $this->unit->run($this->prueba2(),'is_array',$nombre2,'Prueba de la consulta de notas favoritas, verifica si es un arreglo lo que trae la consulta a la tabla favoritas');
		$this->load->view('pruebas', $datos);
	}
}
