<?php
	
	$conn = new PDO('mysql:host=localhost;dbname=kyoto', 'root', '');

	$query = "SELECT * FROM tb_tarefas WHERE id_tarefa = :id";
	
	$stm = $conn->prepare($query);
	$stm->bindValue(':id', $_GET['id']);

	$stm->execute();

	$item = $stm->fetch(PDO::FETCH_ASSOC);
	echo json_encode($item);
?>