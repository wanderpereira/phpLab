<?php


function consulta(){
	
    require_once("model/banco.php");

    $mysqli = conecta();
	$query = $mysqli->query("SELECT * FROM produto ORDER BY nome");

	if ($query) {
	echo "Produtos cadastrados <br>";
    printf("Retornou %d linhas.\n", $query->num_rows);
    
    print '<title>Estoque - Consulta</title>';
    print '<hr>';
    print '<br>';
    print '<style>
             body{background: #93d9f4;}
             table{background: #fff; text-align: center; font-weight: bolder; border: 1px solid #000; padding: 0.5em; box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);} 
             a{background: #e9e9e9; text-decoration: none; border: 1px solid blue; color: black; font-weight: bolder;}
             hr{background: #000}
             .editar{color: green} 
             .excluir{color: red}
           </style>';
    print '<table>';


    if (isset($_POST["button"])) {

        $ordem = $_POST["selecionar"];
        $palavra = $_POST["pesquisa"];

        if($ordem == 'nome'){
        $query = $mysqli->query("SELECT * FROM produto WHERE nome LIKE '%".$palavra."%'");
    }   elseif($ordem == 'id'){
        $selected = "Selected";
        $query = $mysqli->query("SELECT * FROM produto WHERE id LIKE '%".$palavra."%'");
    }

     }



    print '<tr>';
    print '<form method="post">';
    print '<td><select name="selecionar">';
    echo '<option '.$selected.' value="nome">Nome</option>';
    echo '<option '.$selected.' value="id">ID</option>';
    print '</select>';
    print '<input type="text" name="pesquisa"></td>';
    print '<td> <input type="submit" name="button" value="Pesquisar"></td>';
    print '</form>';
    print '<td><a href="view/incluir.php"> Novo cadastro </a></td>';
    print '</tr>';

    print'<tr>';
    print'<th>ID</th>';
    print'<th>Nome</th>';
    print'<th>Preço</th>';
    print'<th>Nº Estoque</th>';
    print'<th>Ações</th>';
  	print'</tr>';

	while($row = $query->fetch_assoc()) {
    print '<tr>';
    print '<td>'.$row["id"].'</td>';
    print '<td>'.$row["nome"].'</td>';
    print '<td>'.$row["preco"].'</td>';
    print '<td>'.$row["estoque"].'</td>';
    print '<td>';
 ?>
    		<a class="editar" href="view/atualizar.php?editar=<?php echo $row["id"];?>">Editar</a>
    		<a class="excluir" href="view/deletar.php?deletar=<?php echo $row["id"];?>"> Excluir </a></td>
   
<?php
    print '</tr>';
}  
	print '</table>';

}


}


function inclui(){

        require_once("../model/banco.php");

        $mysqli = conecta();

            print '<form method="post">';
            print '<label>Nome: </label><input type="text" name="nome" placeholder="Insira o nome do Protudo">';
            print '<br><br>';
            print '<label>Preço: </label><input type="text" name="preco" placeholder="Insira o Preço">';
            print '<br><br>';
            print '<label>Estoque: </label><input type="text" name="estoque" placeholder="Insira o Estoque">';
            print '<br><br>';
            print '<input type="submit" name="button" value="Gravar">';
            print '</form>';
            //print '<button onclick="window.location.href='index.php'>Voltar p/ Inicial</button>';

            if (isset($_POST["button"])) {

                $nome = $_POST["nome"];
                $preco = $_POST["preco"];
                $estoque = $_POST["estoque"];

                $mysqli->query("INSERT INTO produto (id, nome, preco, estoque) VALUES (NULL, '$nome', '$preco', '$estoque');");

                header('Location: ../index.php');
                
            }    
}


function atualiza(){
    
    require_once("../model/banco.php");

    if (isset($_GET["editar"])) {
        
        $elemento = $_GET['editar'];

        $mysqli = conecta();
        $query = $mysqli->query("SELECT * FROM produto WHERE id = '$elemento' ");
        while ($row = $query->fetch_assoc()){

            print '<title> Estoque - Editar ID -> '.$row["id"].'</title>';
            print '<form method="post">';
            print '<label>ID: </label><input type="text" name="id" value="'.$row["id"].'">';
            print '<br><br>';
            print '<label>Nome: </label><input type="text" name="nome" placeholder="'.$row["nome"].'">';
            print '<br><br>';
            print '<label>Preço: </label><input type="text" name="preco" placeholder="'.$row["preco"].'">';
            print '<br><br>';
            print '<label>Estoque: </label><input type="text" name="estoque" placeholder="'.$row["estoque"].'">';
            print '<br><br>';
            print '<input type="submit" name="button" value="Atualizar">';
            print '</form>';

            if (isset($_POST["button"])) {

                $nome = $_POST["nome"];
                $preco = $_POST["preco"];
                $estoque = $_POST["estoque"];

                $mysqli->query("UPDATE produto SET nome = '$nome', preco = '$preco', estoque = '$estoque'  WHERE id = '$elemento';");

                header('Location: ../index.php');
                
            }
        }
    }  
    else{
        header("Location: ../index.php");
    }
    
}


function deleta(){
    require_once("../model/banco.php");

    if (isset($_GET["deletar"])) {
       
       $elemento = $_GET['deletar'];

       $mysqli = conecta();
       $query = $mysqli->query("DELETE FROM produto WHERE id = '$elemento' ");
       header('Location: ../index.php');
    }
}

?>