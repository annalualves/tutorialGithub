<?php

 //inicia a sessão
     if(!isset($_SESSION))
         session_start();

  //produtos cadastrados em um estoque 

     //se ja existe a variavel na sessao, apenas recupera para todos os produtos
     if(isset($_SESSION['todos_produtos'])){
     	$todos_produtos = $_SESSION['todos_produtos'];
     }else{//teste git

		$todos_produtos = array(
		    array("id"=>"p01", "descricao"=> "windows defender", "qt"=>10, "preco"=>99.50), //item 1
		    array("id"=>"p02", "descricao"=> "avg", "qt"=>20, "preco"=>88.99), //item2
		     array("id"=>"p03", "descricao"=> "kaspersky", "qt"=>20, "preco"=>79.96) //item3
		  );
		$_SESSION['todos_produtos'] = $todos_produtos;
     }
  

 
?>