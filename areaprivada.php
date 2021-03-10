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
require_once 'classes/chaves.php';
$u = new Cadastro;
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
					 <h1> Cadastro de Patrimonio </h1>
					 <hr><br><br>
					 <form method="post"> 
                         <input type="submit" value="Salvar" class="btn">
						 <input type="reset" value="Limpar" class="btn">
						 <br><br>

						 Patrimonio da Maquina<br>
						 <input type="txt" name="chave" class="campo" maxlength="50" required autofocus><br>
						 <br>Licenciamento<br>
						 <input type="txt" name="licenciamento1" class="campo" maxlength="50"><br>
						 <label for ="descricao1"> </label>
						 <select name= descricao1>
							 <option value="">Selecione</option>
							 <option value="1">Windows 7</option>
							 <option value="2">Windows 8</option>
							 <option value="3">Windows 10</option>
							 <option value="4">Windows PRO</option>
							 <option value="5">AUTOCAD</option>
                         </select>
						 <br><br>Licenciamento<br>
						 <input type="txt" name="licenciamento2" class="campo" maxlength="50" ><br>
						 <label for ="decricao2"> </label>
						 <select name = decricao2>
							 <option value="">Selecione</option>
							 <option value="1">Windows 7</option>
							 <option value="2">Windows 8</option>
							 <option value="3">Windows 10</option>
							 <option value="4">Windows PRO</option>
							 <option value="5">AUTOCAD</option>
                         </select>
						 <br><br>Licenciamento<br>
						 <input type="txt" name="licenciamento3" class="campo" maxlength="50" ><br>
						 <select name = decricao3>
							 <option value="">Selecione</option>
							 <option value="1">Windows 7</option>
							 <option value="2">Windows 8</option>
							 <option value="3">Windows 10</option>
							 <option value="4">Windows PRO</option>
							 <option value="5">AUTOCAD</option>
                         </select>
						 <br><br>Licenciamento<br>
						 <input type="txt" name="licenciamento4" class="campo" maxlength="50" ><br>
						 <select name = decricao4>
							 <option value="">Selecione</option>
							 <option value="1">Windows 7</option>
							 <option value="2">Windows 8</option>
							 <option value="3">Windows 10</option>
							 <option value="4">Windows PRO</option>
							 <option value="5">AUTOCAD</option>
                         </select>
						 <br><br>Licenciamento<br>
						 <input type="txt" name="licenciamento5" class="campo" maxlength="50" ><br>
						 <select name = decricao5>
							 <option value="">Selecione</option>
							 <option value="1">Windows 7</option>
							 <option value="2">Windows 8</option>
							 <option value="3">Windows 10</option>
							 <option value="4">Windows PRO</option>
							 <option value="5">AUTOCAD</option>
                         </select>
                <?php
                //verificar se clicou no botao
                if(isset($_POST['chave']))
                {
	    $chave = addslashes($_POST['chave']); //addslashes evita codigos maliciosos.
	    $licenciamento1 = addslashes($_POST['licenciamento1']);
		$descricao1 = addslashes($_POST['descricao1']);
	    $licenciamento2 = addslashes($_POST['licenciamento2']);
		$decricao2 = addslashes($_POST['decricao2']);
	    $licenciamento3 = addslashes($_POST['licenciamento3']);
		$decricao3 = addslashes($_POST['decricao3']);
	    $licenciamento4 = addslashes($_POST['licenciamento4']);
		$decricao4 = addslashes($_POST['decricao4']);
        $licenciamento5 = addslashes($_POST['licenciamento5']);
		$decricao5 = addslashes($_POST['decricao5']);
	    //verificando se todos os campos nao estao vazios
	        if(!empty($chave) && !empty($licenciamento1))
	        {
		        $u->conectar("projeto_login","localhost","root","");
		        if ($u->msgErro=="") //conectado normalmente;
		        {
			
				    if ($u->cadastrar_chave($chave, $licenciamento1, $descricao1, $licenciamento2, $decricao2,
					$licenciamento3, $decricao3, $licenciamento4, $decricao4, $licenciamento5, $decricao5))
				    {
					    ?>
					    <div id='msg_sucesso'>
						    Cadastrado com sucesso!
					    </div>
					    <?php
				    }
				    else
			 	    {
					    ?>
					    <div class="msg_erro">
						    Chave de Registro já cadastrada
					    </div>
					    <?php
			 	    }
					
		        }
		        else
			    {
				    ?>
				    <div class="msg_erro">
					    <?php echo "Erro: ".$u->msgErro;?>
				    </div>
				    <?php
			    }
		}
	    else
		{
		?>
		<div class="msg_erro">
			Preencha todos os campos!
		</div>
		<?php
		}
    }
        ?>
            </section>	 
		</div>
    </body>
</hatml>

