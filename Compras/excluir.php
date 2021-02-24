<?php
//inicia a sessão
     if(!isset($_SESSION))
         session_start();

//verificar se existe o carrinho
	if (isset($_SESSION['carrinho'])) {
	 	//recebe o produto que será excluido
	 	if(isset($_GET['id'])){

	 		$id=$_GET['id'];

	 		foreach ($_SESSION['carrinho'] as $i => $item) {
	 			if ($item['id'] == $id) {
	 				//eliminar o item de indice $i da variavel de sessão
	 				unset($_SESSION['carrinho'][$i]);
	 			}
	 		}
	 	}
	 } 
	 header("Location: carrinho.php");
?>
