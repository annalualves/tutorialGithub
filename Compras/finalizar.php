<?php
	include_once "dados.php";

	if(!isset($_SESSION))
        session_start();

     //se existir o carrinho na sessão
    if(isset($_SESSION['carrinho'])){

    	//contar os itens que atenderam ao requisito de quantidade
    	$itens_qt_ok = 0;

     	//percorrer todos os itens do carrinho
     	//para cafa item, localicar no array $todos_produtos e atualizar a quantidade

     	foreach ($_SESSION['carrinho'] as $item) {
     		// pesquisar o id no array todos_produtos e atualizar a quantidade
     		 $qt_produtos = count($todos_produtos);

            //perquisar o id no array $todos_produtos
            $i = 0;

            while($i < $qt_produtos && $todos_produtos[$i]['id'] != $item['id'])
                 $i++;

             if($i < $qt_produtos){            
                  //teste git   
             	//verificar se a quantidade no carrinho é menor ou igual ao estoque
             	if ($item['qt'] <= $todos_produtos[$i]['qt']) {
             	//atualizar a quantidade o array $todos_produtos
             		$todos_produtos[$i]['qt'] -= $item['qt']; 
             		$itens_qt_ok++;
             	}
                    			 
			  
             } //fim if($i < $qt_produtos)            
            } //fim foreach

            //verificar se a quantidade de produtos que atendem ao requisito de quantidade é a mesma quantidade de itens no carrinho -> todos os produtoos atenderam ao requisito

            if($itens_qt_ok == count($_SESSION['carrinho'])){

            	//atualizar a variável da sessão
            	$_SESSION['todos_produtos'] =  $todos_produtos;

              	//limpar o carrinho
              	unset($_SESSION['carrinho']);

            	//guarda na sessao que a compra deu certo 
              	$_SESSION['compra_efetuada'] = true;
            }
        


      	} // fim if($_SESSION['carrinho'])
    //redireciona para página produtos
    header("Location:mensagem.php");

?>