<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cadastro_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}


		public function display() {
			$query = $this->db->get_where('tb_tarefas', array("id_user" => 1));
			return $query->result();
		}


		public function cadastro() {
			$dados = array(
				'id_user' => 1,
				'titulo' => $_POST['titulo'],
				'descricao' => $_POST['descricao'],
				'data_hora' => $_POST['prazo'].":00"
			);
			$this->db->insert('tb_tarefas', $dados);
		}
	}

?>