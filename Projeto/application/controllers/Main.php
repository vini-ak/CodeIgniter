<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public $lista;

	function __construct() {
		parent::__construct();
		$this->load->model('Cadastro_model');
	}

	public function index() {
		// Carregando o helper form para ajudar com os formulários
		$this->load->helper('form');

		// Carregando as tarefas já cadastradas no banco de dados	
		$this->lista['queries'] = $this->Cadastro_model->display();

		// Carregando a view principal
		$this->load->view('main_view', $this->lista);
	}

	public function cadastro() {
		// Adicionando uma nova tabela no banco de dados
		$this->Cadastro_model->cadastro();
		$this->index();
	}
}

?>