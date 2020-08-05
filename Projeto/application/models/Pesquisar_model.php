<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pesquisar_model extends CI_Model{
		function __construct() {
			parent::__construct();
		}
		public function pesquisar() {
			$valor = $this->input->get("pesquisar");

			$query = $this->db->get_where('tb_tarefas', array("id_user" => 1, "titulo" => $valor));
			if($this->num_rows() > 0) {
				return $query->result();
			} else {
				return array("Nenhum valor foi encontrado T.T");
			}
		}
	}
	
 ?>