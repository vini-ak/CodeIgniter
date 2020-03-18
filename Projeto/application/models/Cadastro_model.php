<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cadastro_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}


		public function cadastro() {
			$dados = array(
				'id_user' => 1,
				'titulo' => $this->input->post('titulo'),
				'descricao' => $this->input->post('descricao'),
				'data_hora' => $this->input->post('prazoData')." ".$this->input->post('prazoHora')
			);
			$this->db->insert('tb_tarefas', $dados);

			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
	}

?>