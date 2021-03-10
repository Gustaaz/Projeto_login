<?php
//verificando se a sessao existe e evitando acesso indevido.
  session_start();
  if (!isset($_SESSION['id_usuario'])) 
  {  //se não está definido o id do usuario na sessao
    header("location:index.php");
    exit();
  }
?>
<?php

include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql_code = "SELECT * FROM cadastros WHERE id_cadastro = '$id'";
$sql_query = $conexao->query($sql_code) or die ($conexao->error);
$linha = $sql_query->fetch_assoc();

?>
<!DOCTYPE html>
    <hatml lang="pt-br">
         <head>
             <meta charset="utf-8">
            
             <link rel="stylesheet" href="css/estilo4.css">
         </head>
         <body>
			 <div class="container">
				 <nav>
					 <ul class="menu">
						 <a href="areaprivada.php"> <li> Cadastro </li></a>
						 <a href="consulta.php" ><li> Consulta </li></a>
                     </ul>
                 </nav>
				 <section>
					 <h1> Editar o Patrimonio </h1>
					 <hr><br><br>
					 <form method="post" action="proc_edit.php"> 
                         <input type="submit" value="Salvar" class="btn">
						 <input type="reset" value="Limpar" class="btn">
						 <br><br>

						 Patrimonio da Maquina<br>
                         <input type="hidden" name="id_cadastro" value="<?php echo $linha['id_cadastro']; ?>">
						 <input type="txt" name="chave" class="campo" maxlength="50" required autofocus value="<?php 
                         echo $linha['chave']; ?>"><br>
						 <br>Licenciamento<br>
						 <input type="txt" name="licenciamento1" class="campo" maxlength="50" value="<?php 
                         echo $linha['licenciamento1']; ?>"><br>
						 <label for ="descricao1"> </label>
						 <select name= descricao1>
							 <option value="">Selecione</option>
							 <option value="1">Windows</option>
							 <option value="2">Linux</option>
							 <option value="3">Mac</option>
                         </select>
						 <br><br>Licenciamento<br>
						 <input type="txt" name="licenciamento2" class="campo" maxlength="50" value="<?php 
                         echo $linha['licenciamento2']; ?>"><br>
						 <label for ="decricao2"> </label>
						 <select name = decricao2>
							 <option value="">Selecione</option>
							 <option value="1">Windows</option>
							 <option value="2">Linux</option>
							 <option value="3">Mac</option>
                         </select>
						 <br><br>Licenciamento<br>
						 <input type="txt" name="licenciamento3" class="campo" maxlength="50" value="<?php 
                         echo $linha['licenciamento3']; ?>"><br>
						 <select name = decricao3>
							 <option value="">Selecione</option>
							 <option value="1">Windows</option>
							 <option value="2">Linux</option>
							 <option value="3">Mac</option>
                         </select>
						 <br><br>Licenciamento<br>
						 <input type="txt" name="licenciamento4" class="campo" maxlength="50" value="<?php 
                         echo $linha['licenciamento4']; ?>"><br>
						 <select name = decricao4>
							 <option value="">Selecione</option>
							 <option value="1">Windows</option>
							 <option value="2">Linux</option>
							 <option value="3">Mac</option>
                         </select>
						 <br><br>Licenciamento<br>
						 <input type="txt" name="licenciamento5" class="campo" maxlength="50" value="<?php 
                         echo $linha['licenciamento5']; ?>"><br>
						 <select name = decricao5>
							 <option value="">Selecione</option>
							 <option value="1">Windows</option>
							 <option value="2">Linux</option>
							 <option value="3">Mac</option>
                         </select>
            </section>	 
		</div>
    </body>
</hatml>
