<?php
$this->load->view('navbar');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Planner Kyoto</title>

	<style type="text/css">
		.seEsforcaEhPraJesus {
			margin-top: 50px;
		}


		.apresentacao {
			margin-top: 120px;
		}
	</style>
</head>

<body>

	<div class="apresentacao container p-3 bg-dark text-white">
		<h1>Atividades</h1>
		<h5>CRUD com as tarefas que preciso realizar no meu cotidiano</h5>

	</div>

	<div class="container seEsforcaEhPraJesus">

		<div class="alert alert-info" style="display: none;"></div>

		<!-- Adicionar uma nova tarefa -->
		<button id="btnAdd" class="btn btn-primary mb-4"=>Adicionar uma nova tarefa</button>

		<!-- Nomes dos campos da tabela -->
		<table class="table table-bordered table-responsive">
			<thead class="thead-dark">
				<tr>
					<th scope="col" class="col-1">#</th>
					<th scope="col" class="col-2">Título</th>
					<th scope="col" class="col-6">Descrição</th>
					<th scope="col" class="col-2">Prazo</th>
					<th scope="col" class="col-3">Ações</th>
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
						<input type="hidden" name="tarefaID" value="0">
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
				$('#modalCadastro').modal('show');
				$('#modalCadastro').find('.modal-title').text('Nova tarefa');
				$('#formCadastro').attr('action', '<?php echo base_url(); ?>index.php/main/cadastro');
			});


			// Cadastro
			$('#btnSave').click(function(){
				let urlCadastro = $("#formCadastro").attr("action");
				let formulario = $("#formCadastro").serialize();

				let titulo = $("input[name=titulo]");
				let data = $("input[name=prazoData]");
				let hora = $("input[name=prazoHora]");
				let result = '';




				// Caso seja passado um título vazio será apresentada uma mensagem de erro abaixo do input Titulo do modal
				if(titulo.val() == ''){
					titulo.addClass('is-invalid');
					if($("#groupTitulo").find("#erro1").length == 0) {
						erro1 = "<small id='erro1' class='text-danger'>O título não pode ser nulo</small>";
						$("#groupTitulo").append(erro1);
					}
					
				} else {
					titulo.removeClass('is-invalid');
					$('#erro1').remove();
					result += '1';
				}



				// Lembrando que a descrição da tarefa é opcional!
				



				// Caso seja passada uma data inválida, será apresentada uma mensagem de erro abaixo do input data do modal.
				if(data.val() == ''){
					data.addClass('is-invalid');
					if($("#groupData").find("#erro2").length == 0) {
						erro2 = "<small id='erro2' class='text-danger'>A data precisa ser informada</small>";
						$("#groupData").append(erro2);
					}
				} else {
					data.removeClass('is-invalid');
					$('#erro2').remove();
					result += '2';
				}




				// Caso seja passada uma hora inválida, será apresentada uma mensagem de erro no modal.
				if(hora.val() == ''){
					hora.addClass('is-invalid');
					if($("#groupHora").find("#erro3").length == 0) {
						erro3 = "<small id='erro3' class='text-danger'>Insira uma hora válida</small>";
						$("#groupHora").append(erro3);
					}
				} else {
					hora.removeClass('is-invalid');
					$('#erro3').remove();
					result += '3';
				}				



				if(result == '123') {
					// Caso não haja erro nos preenchimentos dos campos será realizada uma requisição ajax.
					// Esta requisição é para CADASTRO de novas TAREFAS.
					$.ajax({
						type: 'ajax',
						url: urlCadastro,
						method: 'post',
						data: formulario,
						async: true,
						dataType: 'json',
						success: function(response) {
							$('#modalCadastro').modal('hide');
							consultar();
							$('.alert-info').html("Tarefa cadastrada com sucesso").fadeIn().delay(4000).fadeOut("slow");
						},
						error: function() {
							alert('Oxe boy, alguma coisa deu errado. Viagem do carai...');
						}
					});

				} else {
					$("#btnSave").removeAttr('data-dismiss');
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
										'<td id="titulo'+data[i]['id_tarefa']+'">'+data[i]['titulo']+'</td>' + 
										'<td>'+data[i]['descricao']+'</td>' + 
										'<td>'+data[i]['data_hora']+'</td>' +
										'<td>' +
											'<a href="javascript:;" class="btn btn-info btn-sm btnEdit" data="' +data[i]['id_tarefa'] +'">Editar</a>' +
											'<a href="javascript:;" class="btn btn-danger btn-sm btnDel" data="'+ data[i]['id_tarefa'] +'">Deletar</a>' +
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

			// Deletar
			$("#tarefas").on("click", '.btnDel', function() {

				let id = parseInt($(this).attr('data'));	// id_tarefa
				let titulo = '#titulo' + id;	// Titulo da atividade

				// Alert
				resposta = confirm('Você tem certeza que deseja deletar "' + $("#tarefas").find(titulo).text() + '"?');

				if(resposta) {
					$.ajax({
						type: 'ajax',
						url: "<?php echo base_url() ?>index.php/main/deletar",
						data: {'id_tarefa': id},
						dataType: 'json',
						method: 'get',
						async: true,
						success: function() {
							consultar();
							$(".alert-info").html("A tarefa removida com sucesso").fadeIn().delay(4000).fadeOut("slow");
						},
						error: function() {
							alert("Não foi possível deletar");
						}
					});
				}
			});

			$("#tarefas").on('click', '.btnEdit', function() {
				let id = parseInt($(this).attr('data'));	// id_tarefa
				let titulo = $("#tarefas").find('#titulo' + id).text();	// Titulo da atividade
				$("#modalCadastro").find(".modal-title").text(titulo);
				
			});
		});
	</script>
</body>
</html>