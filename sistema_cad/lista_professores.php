<?php
    session_start();

    $dados_conexao = array(
        'hostname' => 'localhost',
        'user' => 'root',
        'password' => '',
        'database' => 'escola_teste',
        'table' => 'professores'
    );
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Lista de professores</title>
</head>
<?php 
    include_once 'cabecalho.php';
?>
<body>
    <h1>Lista de cadastro dos professores!</h1>
    <hr><br>
            <div id='div-tabela'>
                <table id='tabela'>
                    <thead id='thead'>
                        <tr class='titulos-thead'>
                            <th width='50px'>ID</th>
                            <th width='180px'>Nome</th>
                            <th width='260px'>E-mail</th>
                            <th width='180px'>Celular</th>
                            <th width='200px'>CPF</th>
                            <th width='120px'>Nascimento</th>
                            <th width='120px'>Turno</th>
                            <th width='160px'>Data de Cadastro</th>
                        </tr>
                    </thead>
                    <tbody id='tbody'>
                    <?php
                        tabela_professores(lista_professores(conectar($dados_conexao))); 
                    ?>
                    </tbody>
                </table>
            </div>
            <a href="cad_professor.php"><input type="submit" value="Cadastrar novo" class="botao"></a>
</body>
</html>

<?php

    function tabela_professores($dados)
    {
        foreach ($dados as $key => $value) {

        echo "
                <tr class='resultados-tbody'>
                    <td width='50px'>" . $value[0] . "</td>
                    <td width='180px'>" . $value[1] . "</td>
                    <td width='260px'>" . $value[2] . "</td>
                    <td width='180px'>" . $value[3] . "</td>
                    <td width='200px'>" . $value[4] . "</td>
                    <td width='120px'>" . $value[5] . "</td>
                    <td width='120px'>" . $value[6] . "</td>
                    <td width='160px'>" . $value[7] . "</td>
                </tr>";
        }
    }

    function lista_professores($conectar)
    {
        $resultado = mysqli_query($conectar[0],'SELECT * FROM professores');

        if ($resultado) {
            $result = $resultado->fetch_all(MYSQLI_NUM);
        } else {
            echo 'Erro ao executar a busca.';
        }

        return $result;
    }

    function conectar($dados_conexao)
    {
        $conexao = mysqli_connect($dados_conexao['hostname'], $dados_conexao['user'], $dados_conexao['password'], $dados_conexao['database']);

        if (!$conexao) {
            die(trigger_error('Não foi possível conectar ao banco de dados'));
            return false;
        } else {
            $conectar = mysqli_select_db($conexao, $dados_conexao['database']);

            if (!$conectar) {
                die(trigger_error('Não foi possível conectar ao banco de dados'));
                return false;
            } else {
                $conectou = array(
                    '0' => $conexao,
                    '1' => $conectar
                );
            }
        }

        return $conectou;
    }
?>