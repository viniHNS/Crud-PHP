<h1>Listar usuario</h1>
<?php 
    $sql = "SELECT * FROM usuarios";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>Email</th>";
        print "<th>Data de nascimento</th>";
        print "<th>Ações</th>";
        print "</tr>";

        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id."</td>";
            print "<td>".$row->nome."</td>";
            print "<td>".$row->email."</td>";
            print "<td>".date('d/m/Y', strtotime($row->data_nascimento))."</td>";
            print "<td>";
            print "<button onclick=\" location.href='?page=editar&id=".$row->id."'; \" class='btn btn-primary'>Editar</button>";
            print "<button onclick=\" if(confirm('Tem certeza que deseja deletar?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;} \" class='btn btn-danger'>Excluir</button>";






        }
    } else {
        print "<div class='alert alert-danger' role='alert'>
        Não há usuários cadastrados!
        </div>";
    }
?>