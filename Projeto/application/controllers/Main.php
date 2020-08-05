<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->helper('url');
		//$this->load->database('kyoto');
	}

	public function index() {
		// Carregando o helper form para ajudar com os formulários
		$this->load->helper('form');

		// Carregando a view principal
		$this->load->view('main_view');
	}

	public function cadastro() {
		// Adicionando uma nova tabela no banco de dados
		$this->load->model('Cadastro_model');
		$result = $this->Cadastro_model->cadastro();

		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

	public function consultar() {
		// Acessando o model consultar
		$this->load->model('Consultar_model');
		$result = $this->Consultar_model->consultar();
		echo json_encode($result);
	}

	public function editar() {
		// Acessando o model editar
		$this->load->model('Editar_model');
		$result = $this->Editar_model->editar();

		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

	public function deletar() {
		// Acessando o model de delecao
		$this->load->model('Deletar_model');
		$result = $this->Deletar_model->deletar();

		$msg['success'] = false;
		if($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

	public function pesquisar() {
		// Pesquisar tarefas pelo nome
		$this->load->model('Pesquisar_model');
		$result = $this->Pesquisar_model->pesquisar();

		echo json_encode($result);
	}
}

?>