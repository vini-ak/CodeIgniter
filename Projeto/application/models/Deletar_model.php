<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 MODEL RESPONSAVEL PELA DELETAÇÃO
	 */
	class Deletar_model extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		public function deletar() {
			$id = $this->input->get('id_tarefa');

			$this->db->where('id_tarefa', $id);
			$this->db->delete('tb_tarefas');

			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
	}
	
 ?>