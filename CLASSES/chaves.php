<?php
 Class Cadastro {
	private $pdo;  /*criando variavel para usar nas funçoes*/
	public $msgErro="";
  	public function conectar($dbnome, $host, $usuario, $senha)
  	{
  		global $pdo;
      global $msgErro;
  		try
  		{
  			$pdo = new PDO("mysql:dbname=".$dbnome.";host=".$host,$usuario,$senha);
  		} catch (PDOException $e) {
  			$msgErro - $e->getMessage(); /*pega a mensagem de erro do php e joga na variavel msegErro e mostra pro usuario.*/
  		}
  	}
    public function cadastrar_chave($chave, $licenciamento1, $descricao1, $licenciamento2, $decricao2, $licenciamento3, $decricao3, 
        $licenciamento4, $decricao4, $licenciamento5, $decricao5)
  	{
  		global $pdo;
      global $msgErro;
  		//verificando se existe chave cadastrada.
  		$sql = $pdo->prepare("SELECT id_cadastro FROM cadastros WHERE chave=:c"); //pega o id do usuario buscando pelo emial preenchido no cadastro
  		$sql->bindValue(":c" , $chave);  //substitui o :c pela chave preenchido no cadastro
  		$sql->execute();
  		if($sql->rowCount()>0) //verificando houve resposta na consulta
  		{
  			return false; // ja tem cadastro
  		}
  		else
  		{
  			//caso nao tenha
  			$sql = $pdo->prepare("INSERT INTO cadastros (chave, licenciamento1, descricao1, licenciamento2, decricao2, licenciamento3, decricao3, 
			  licenciamento4, decricao4, licenciamento5, decricao5) VALUES (:c, :l1, :d1, :l2, :d2, :l3, :d3, :l4, :d4, :l5, :d5)");
	  		$sql->bindValue(":c", $chave);
			$sql->bindValue(":l1", $licenciamento1);
			$sql->bindValue(":d1", $descricao1);
			$sql->bindValue(":l2", $licenciamento2);
			$sql->bindValue(":d2", $decricao2);
			$sql->bindValue(":l3", $licenciamento3);
			$sql->bindValue(":d3", $decricao3);
			$sql->bindValue(":l4", $licenciamento4);
			$sql->bindValue(":d4", $decricao4);
			$sql->bindValue(":l5", $licenciamento5);
			$sql->bindValue(":d5", $decricao5);
	  		$sql->execute();
	  		return true;
  		}

  	}
}
?>
