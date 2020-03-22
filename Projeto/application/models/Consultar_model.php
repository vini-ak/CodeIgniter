<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultar_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	public function consultar() {
		# Ordenando por ordem alfabética
		$this->db->order_by('data_hora', 'asc');

		# Pegando todas as tarefas relacionadas a um mesmo usuário
		$query = $this->db->get_where('tb_tarefas', array("id_user" => 1));
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array('erro' => 'Problema com o banco de dados');
		}
	}
}