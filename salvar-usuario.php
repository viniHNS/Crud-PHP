<?php 
    switch (@$_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $data_nascimento = $_POST['data-nascimento'];

            $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento) VALUES ('$nome', '$email', '$senha', '$data_nascimento')";

            if ($conn->query($sql) === TRUE) {
                print "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>
                <div class='alert alert-success' role='alert'>Você será redirecionado em 2 segundos!</div>
                <script>
                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 2000);
                </script>";
                
            } else {
                print "<div class='alert alert-danger' role='alert'>
                Erro ao cadastrar usuário!
                </div>";
            }

            break;


        case 'editar':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $data_nascimento = $_POST['data-nascimento'];

            $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', data_nascimento = '$data_nascimento' WHERE id = ".$_REQUEST['id'];

            if ($conn->query($sql) === TRUE) {
                print "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>
                <div class='alert alert-success' role='alert'>Você será redirecionado em 2 segundos!</div>
                <script>
                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 2000);
                </script>";
                
            } else {
                print "<div class='alert alert-danger' role='alert'>
                Erro ao editar usuário!
                </div>";
            }
            break;


        case 'excluir':
            
            $sql = "DELETE FROM usuarios WHERE id = ".$_REQUEST['id'];

            if ($conn->query($sql) === TRUE) {
                print "<div class='alert alert-success' role='alert'>Usuário excluído com sucesso!</div>
                <div class='alert alert-success' role='alert'>Você será redirecionado em 2 segundos!</div>
                <script>
                    setTimeout(function(){
                        window.location.href = '?page=listar';
                    }, 2000);
                </script>";
                
            } else {
                print "<div class='alert alert-danger' role='alert'>
                Erro ao excluir usuário!
                </div>";
            }
            break;    
        default:
            print "<h1>Bem vindo ao CRUD</h1>";  
    }
?>