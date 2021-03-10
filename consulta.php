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
include_once ("conexao.php");//incluindo o banco de dados

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";//criando uma variavel para não dar error

$sql_code = "SELECT * FROM cadastros WHERE chave LIKE '%$filtro%'";//fazendo conex/ao com a tabela
$sql_query = $conexao->query($sql_code) or die ($conexao->error);
$linha = $sql_query->fetch_assoc();

$descricao[0]="";
$descricao[1]=" - Windows 7";
$descricao[2]=" - Windows 8";
$descricao[3]=" - Windows 10";
$descricao[4]=" - Windows PRO";
$descricao[5]=" - AUTOCAD";

?>
<!DOCTYPE html>
       <hatml lang="pt-br">
           <head>
              <meta charset="utf-8">
                 <link rel="stylesheet" href="CSS/estilo3.css">
            </head>
                <body>
			             <div class="container">
				    <section>
					        <h1> Consulta </h1>
					        <hr><br><br>

           <form method="get">
               Insira o Patrimonio: <input type="text" name="filtro" class="campo" required autofocus>
               <input type="submit" name="Pesquisar" class="btn">
               <br></br>
            </form>
                <article>
                    <table>
                      <tr>
                        <th>ID</td>
                        <th>Patrimonio da Maquina</th>
                        <th>Licenciamento</th>
                        <th>Licenciamento</th>
                        <th>Licenciamento</th>
                        <th>Licenciamento</th>
                        <th>Licenciamento</th>
                      </tr>
                      <?php
                          do{
                      ?>
                      <tr>
                        <td><?php echo $linha['id_cadastro']; ?></td>
                        <td><?php echo $linha['chave']; ?></td>
                        <td><?php echo $linha['licenciamento1']; echo  $descricao[$linha['descricao1']]; ?></td>
                        <td><?php echo $linha['licenciamento2']; echo  $descricao[$linha['decricao2']]; ?></td>
                        <td><?php echo $linha['licenciamento3']; echo  $descricao[$linha['decricao3']]; ?></td>
                        <td><?php echo $linha['licenciamento4']; echo  $descricao[$linha['decricao4']]; ?></td>
                        <td><?php echo $linha['licenciamento5']; echo  $descricao[$linha['decricao5']]; ?></td>
                        <td>
                          <a href="edit.php?id=<?php echo $linha['id_cadastro']; ?>">Editar</a>
                          <a href="javascript: if(confirm('Tem certeza que deseja deletar o patrimonio <?php echo $linha['chave']; ?> ?')) 
                          location.href= 'delete.php?id=<?php echo $linha['id_cadastro']; ?>';">Deletar</a>
                        </td>
                      </tr>
                      <?php } while($linha = $sql_query->fetch_assoc());?>
                    </table>
                    <br>
                    </article>
                    <a href="areaprivada.php"> <li> Cadastro </li></a>
						        <a href="consulta.php" ><li> Consulta </li></a>

          </section>	
		</div>
    </body>
  </hatml>

