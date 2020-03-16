<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Planner Kyoto</title>

	<style type="text/css">
		.seEsforcaEhPraJesus {
			margin-top: 150px
		}

		.text-title {
			margin-bottom: 30px;
			font-family: monospace;
		}
	</style>
</head>

<body>

	<div class="container seEsforcaEhPraJesus">
		<h1 class="text-center text-title">Atividades</h1>

		<!-- Adicionar uma nova tarefa -->
		<button id="btnAdd" class="btn btn-primary mb-4"=>Adicionar uma nova tarefa</button>

		<!-- Nomes dos campos da tabela -->
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<td>ID</td>
					<td>Título</td>
					<td>Descrição</td>
					<td>Prazo</td>
					<td>Ações</td>
				</tr>
			</thead>

			<!-- Tabela de tarefas -->
			<tbody id="tarefas"></tbody>

		</table>

	</div>

	<!-- MODAL CADASTRO -->
	<div id="modalCadastro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Definindo uma nova tarefa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formCadastro" action="" method='post'>
						<div class="form-group" id="groupTitulo">
							<label for="#idNome" class="label-control">Título</label>
							<input type="text" name="titulo" class="form-control" id="idNome" aria-describedby="Título da atividade" placeholder="Insira um título para a atividade">
						</div>
						<div class="form-group" id="groupDescricao">
							<label for="idDescricao">Descrição</label>
							<textarea type="text" rowspan=1 name="descricao" class="form-control" id="idDescricao" aria-describedby="Descrição da atividade" placeholder="Descreva um pouco mais sobre sua tarefa..."></textarea>
						</div>
						<div class="form-group" id="groupPrazo">
							<label for="#idPrazo">Prazo</label>
							<div id="groupData">
								<small class="text-secondary font-italic legenda">*A data precisa ser informada no formato mm/dd/aaaa</small>
								<input type="date" name="prazoData" class="form-control" id="idPrazo" aria-describedby="Prazo da atividade" placeholder="Defina um prazo">
							</div>
							<div  id="groupHora">
								<small class="text-secondary font-italic legenda">*A hora precisa ser informada no formato de 12h (A.M. e P.M.)</small>
								<input type="time" name="prazoHora" class="form-control" id="idPrazoHora" aria-describedby="Prazo da atividade" placeholder="Defina um prazo">
							</div>
						</div>	
					</form>		
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-secondary" aria-label="Fechar" data-dismiss="modal">Fechar</button>
					<button type="button" id="btnSave" class="btn btn-primary">Salvar atividade</button>
				</div>
			</div>
		</div>	
	</div>

	<script>
		$(function(){
			consultar();

			$("#btnAdd").click(function(){
				jQuery.noConflict(); 
				$('#modalCadastro').modal('show');
				$('#modalCadastro').find('.modal-title').text('Nova tarefa');
				$('#formCadastro').attr('action', '<?php echo base_url(); ?>index.php/main/cadastro');
			});

			$('#btnSave').click(function(){
				let urlCadastro = $("#formCadastro").attr("action");
				let formulario = $("#formCadastro").serialize();

				let titulo = $("input[name=titulo]");
				let data = $("input[name=prazoData]");
				let hora = $("input[name=prazoHora]");
				let result = '';


				// Validando o título da tarefa
				if(titulo.val() == ''){
					titulo.addClass('is-invalid');
				} else {
					titulo.removeClass('is-invalid');
					$('#erro1').remove();
					result += '1';
				}


				// *** Lembrando que a descrição da tarefa é opcional! ***
				


				// Validando a data da atividade
				if(data.val() == ''){
					data.addClass('is-invalid');
				} else {
					data.removeClass('is-invalid');
					$('#erro2').remove();
					result += '2';
				}


				// Validando a hora
				if(hora.val() == ''){
					hora.addClass('is-invalid');
				} else {
					hora.removeClass('is-invalid');
					$('#erro3').remove();
					result += '3';
				}				


				// Verificando se todas as entradas estão corretas
				if(result == '123') {
					console.log('oi');
					// Caso não haja erro nos preenchimentos dos campos será realizada uma requisição ajax.
					jQuery.noConflict(); 

					$.ajax({
						type: 'ajax',
						url: urlCadastro,
						method: 'post',
						data: formulario,
						async: true,
						dataType: 'json',
						success: function(response) {
							console.log(response);
						},
						error: function() {
							alert('Oxe boy, alguma coisa deu errado. Viagem do carai...');
						}
					});

				} else {
					// Caso haja erro serão printadas na tela mensagens de invalidez

					// Nome inváálido:
					if(!result.includes('1')){
						erro1 = "<small id='erro1' class='text-danger'>O título não pode ser nulo</small>";
						$("#groupTitulo").append(erro1);
					}

					// Data inválida:
					if(!result.includes('2')){
						erro2 = "<small id='erro2' class='text-danger'>A data precisa ser informada</small>";
						$("#groupData").append(erro2);
					}

					// Hora inválida:
					if(!result.includes('3')){
						erro3 = "<small id='erro3' class='text-danger'>Insira uma hora válida</small>";
						$("#groupHora").append(erro3);
					}


				}
			});

			function consultar(){
				$.ajax({
					type: 'ajax',
					url: '<?php echo base_url(); ?>index.php/main/consultar',
					async: true,
					dataType: 'json',
					success: function(data) {
						console.log(data);

						let html = "";
						let i;

						for(i=0; i < data.length; i++) {
							html += '<tr>' +
										'<td>'+data[i]['id_tarefa']+'</td>' + 
										'<td>'+data[i]['titulo']+'</td>' + 
										'<td>'+data[i]['descricao']+'</td>' + 
										'<td>'+data[i]['data_hora']+'</td>' +
										'<td>' +
											'<a href="javascript:;" class="btn btn-info btn-sm">Editar</a>' +
											'<a href="javascript:;" class="btn btn-danger btn-sm">Deletar</a>' +
										'</td>' +
									'</tr>';
						}
						$('#tarefas').html(html);
					},
					error: function() {
						alert("Deu errado de novo esse danado");
					}
				});
			}
		});
	</script>
</body>
</html>