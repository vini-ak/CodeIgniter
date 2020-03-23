<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Editar_model extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}
	}

	public function editar() {
		$id = $this->input->get('id');

		$dados = array(
			'id_user' => 1,
			'titulo' => $this->input->post('titulo'),
			'descricao' => $this->input->post('descricao'),
			'data_hora' => $this->input->post('prazoData')." ".$this->input->post('prazoHora')
		);

		$this->db->where('id_tarefa', $id);	# selecionando o campo pelo id
		$this->db->update('tb_tarefas', $dados);	# atualizando esse item com os dados do formulário

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

?>