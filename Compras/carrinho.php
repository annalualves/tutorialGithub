<?php
    //inicia a sessão
     if(!isset($_SESSION))
         session_start();
//teste git
    //recupera o carrinho que está na sessão ou cria um novo array
    $carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : NULL;
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Carrinho</title>
  </head>
  <body>
   
    <div class="jumbotron bg-transparent">
      <div class="container">
        <h1 class="display-6 text-secondary text-center">Carrinho</h1>
       </p>
      </div>
    </div>
    <?php
      if ($carrinho==NULL) { ?>
        <div class="container">
          <div class="alert alert-warning text-center" role="alert">
            <h3> Seu carrinho está vazio :( </h3>
            <hr>
            <a href="produtos.php" class="alert-link"> Ir para Lista de Produtos</a>
          </div>
        </div>
     <?php }//fim if

        else{  //mostra a tabela com os produtos do carrinho
    ?>

    <div class= "container">
      <table class="table table-hover">

        <thead class="thead-light">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Descrição</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
        </thead>


        <tbody>
          	<?php  
   				foreach ($carrinho as $item){ 
      				$total = $item['qt'] * $item['preco']; 
      				$link = "excluir.php?id=".$item['id'];
			?>  

   			<tr>
     			<td><?php echo $item['id'];?></td>
     			<td><?php echo $item['descricao'];?></td>
     			<td><?php echo $item['qt'];?></td>
     			<td><?php echo "R$ ". number_format($total,2,",",""); ?></td>
     			<td> <a class="btn btn-outline-primary" href=<?php echo $link; ?> role="button">Excluir do Carrinho</a></td>
  			</tr>

			<?php } //fim foreach ?>

        </tbody>
      </table>

    <?php 
   		$total_compra = 0;  //armazena o total da compra
   		foreach ($carrinho as $item){ 
      		$total = $item['qt'] * $item['preco']; 
      		$total_compra += $total; 
      		$link = "#";
      	}
	?>   

    </div>

    <div class="container">
        <h3 class="text-secondary"> Total da Compra: R$ <?=number_format($total_compra,2,",","")?></h3>
    </div>

    <div class="container">
      <!--botao ir para produtos-->
      <a class="btn btn-primary" href="produtos.php" role="button">Ir para lista de produtos</a>
      <!--botao ir para produtos-->
      <a class="btn btn-success" href="finalizar.php" role="button">Finalizar Compra</a>

  <?php 
    } //fim if-else
  ?>



    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>