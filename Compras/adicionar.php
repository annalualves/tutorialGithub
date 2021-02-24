<?php

	//inclui o arquivo "dados.php"
    include_once "dados.php";
//teste git
     //verifica se não há uma sessão iniciada, se não houver, inicia uma nova sessão
    if(!isset($_SESSION))
        session_start();
   
    //recupera o carrinho que está na sessão ou cria um novo array
    $carrinho = isset($_SESSION['carrinho'])? $_SESSION['carrinho']: array();

    if(isset($_GET['id'])){
    	$id = $_GET['id'];
    	//verifica se o produto já está no carrinho
    	$exist_item = false;

    	foreach ($carrinho as $i => $item){
        	if($item['id'] == $id){
            	$exist_item = true;
            
     			//se o produto já existir no carrinho, a quantidade será incrementada
            	$carrinho[$i]['qt']++;
        	}

    	}
    	if(!$exist_item){
    		//adiciona item no carrinho 
			//conta a número de produtos cadastrados
        	$qt_produtos = count($todos_produtos);

    	    //pesquisa o id no array $todos_produtos
        	$i = 0;
        	while($i < $qt_produtos && $todos_produtos[$i]['id'] != $id)
            	$i++;  

        		//encontrou o produto
        	if($i < $qt_produtos){ 
            	//recupera os dados do produto
            	$produto = $todos_produtos[$i];

            	//atualiza a quantidade de produtos no carrinho para 1
            	$produto['qt'] = 1;

            	//adiciona o produto ao final do array carrinho
            	$carrinho[]=$produto;

           	}	//fim if
    	}//fim if $exist_item

    	//atualiza a variavel carrinho na sessão
    	$_SESSION['carrinho'] = $carrinho;	

    	//echo"<pre>";
    	//print_r($carrinho);
    	//echo"</pre>";

    } //fim if isset($_GET['id'])

    //redirecionar para página de produtos
    header("Location:produtos.php");

?>