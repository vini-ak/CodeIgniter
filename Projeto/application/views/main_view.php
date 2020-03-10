<?php $this->load->view('navbar'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Planner Kyoto</title>

	<style type="text/css">
		#title {
			padding-top: 150px;
			color: #042D57;
			margin-bottom: 50px;
		}

		body {
			font-family: monospace;
		}

	</style>


	<script type="text/javascript">
		getTarefa = (indice) => {
			let ajax = new XMLHttpRequest()
			let link = `http://localhost/CodeIgniter/Projeto/ajax/get_tarefa.php?id=${indice}`
			console.log(link)
			ajax.open('GET', link)
			ajax.onreadystatechange = () => {
				if(ajax.readyState == 4 && ajax.status == 200) {
					console.log(ajax.responseText)
					let atividades = JSON.parse(ajax.responseText)
					console.log(atividades)

					if(atividades){
						document.getElementById('titulo_atividade').innerHTML = atividades['titulo']
						document.getElementById('descricao_atividade').innerHTML = atividades['descricao']
						document.getElementById('prazo_atividade').innerHTML = atividades['data_hora']
					}
				}
			}
			ajax.send()

			elemento = indice // Mudando o valor da variável global para poder auxiliar na deleção e alteração
		}
	</script>

</head>
<body>

	<h1 id="title" class="text-center">Atividades</h1>

	<?php
		if($queries) {
			foreach ($queries as $tarefa) {
				$id_tarefa = $tarefa->id_tarefa;
				echo "<button type='button' onclick='getTarefa(\"$id_tarefa\")' value='\"$id_tarefa\"' class='btn btn-md btn-block' data-toggle='modal' data-target='#idModalAtividade'>";
					echo $tarefa->titulo;	
				echo "</button>";
			}
		} else {
			echo "<p>Ainda não temos tarefas cadastradas.</p>";
		}
	?>
	
	<button class="btn btn-link btn-block" style="padding-top: 15px; margin-top: 30px" data-toggle="modal" data-target='#modal_cadastro'>
		<img src="imagens/plus.png" style="display: inline-block" width="15px" height="15px">
		<p class="font-weight-bold" style="display: inline-block" >Adicionar tarefa</p>
	</button>

	<div class="modal fade" tabindex="-1" id="modal_cadastro" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5>Definindo uma nova tarefa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php
						echo form_open('main/cadastro');

						// Título
						echo "<div class='form-group'>";
						echo form_label('Título', 'titulo');
						echo form_input('titulo', '', array('class' => 'form-control', 'id' => 'titulo', 'placeholder' => "Insira um título para a sua tarefa"));
						echo "</div>";
						// Descrição
						echo "<div class='form-group'>";
						echo form_label('Descreva um pouco a tarefa', 'descricao');
						echo form_textarea('descricao', '', array('class' => 'form-control', 'rowspan' => 1, 'type' => 'text', 'id' => 'descricao', 'placeholder' => "Descreva um pouco mais sobre sua tarefa..."));
						echo "</div>";
						// Prazo
						echo "<div class='form-group'>";
						echo form_label('Prazo', 'prazo');
						echo form_input('prazo', '', array('class' => 'form-control', 'id' => 'prazo', 'type' => 'datetime-local', 'placeholder' => "dd/mm/aaaa hh:mm"));
						echo "</div>";

					?>
				</div>
				<div class="modal-footer">
					<?php
						echo form_reset('reset', 'Limpar', array('class' => 'btn btn-secondary'));
						echo form_submit('enviar', 'Adicionar', array('class' => 'btn btn-primary'));
						echo form_close();
					?>
				</div>

			</div>
		</div>
	</div>

	<div class="modal fade" id = "idModalAtividade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 id="titulo_atividade"><?php echo $tarefa->titulo; ?></h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="conteudo_tarefa">
					<p id="descricao_atividade"><?php echo $tarefa->descricao; ?></p>
					<p id="prazo_atividade"><?php echo $tarefa->data_hora; ?></p>
				</div>
				<div class="modal-footer" id="footer_tarefa">
					<button class="btn btn-secondary" data-dismiss="modal" aria-label="Fechar">Fechar</button>
					<button class="btn btn-danger" onclick="deletar(elemento)" type="button">Deletar atividade</button>
					<button class="btn btn-primary" onclick="alterar(elemento)" type="button">Editar</button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>