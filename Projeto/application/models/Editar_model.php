<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Editar_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}


		public function editar() {
			$id = intval($this->input->post('tarefaID'));

			$dados = array(
				'titulo' => $this->input->post('titulo'),
				'descricao' => $this->input->post('descricao'),
				'data_hora' => $this->input->post('prazoData')." ".$this->input->post('prazoHora')
			);

			$this->db->update('tb_tarefas', $dados, array("id_tarefa" => $id));	# atualizando esse item com os dados do formulário

			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

	}

	
?>