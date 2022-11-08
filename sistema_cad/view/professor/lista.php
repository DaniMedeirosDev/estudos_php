<?php
require_once '../../controller/professor.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <title>Lista de professores</title>
</head>
<?php include_once '../cabecalho.php'; ?>

<body>
    <h1>Lista de cadastro dos professores!</h1>
    <hr><br>
    <div id='div-tabela'>
        <table id='tabela'>
            <thead id='thead'>
                <tr class='titulos-thead'>
                    <th width='50px' id="id">ID</th>
                    <th width='130px' id="nome">Nome</th>
                    <th width='230px' id="email">E-mail</th>
                    <th width='140px' id="celular">Celular</th>
                    <th width='140px' id="cpf">CPF</th>
                    <th width='100px' id="nasc">Nascimento</th>
                    <th width='100px' id="turno">Turno</th>
                    <th width='140px' id="data_cad">Data de Cadastro</th>
                    <th width='120px' id="acoes">Ações</th>
                </tr>
            </thead>
            <tbody id='tbody'>
                <?php
                    $tabela = new Professor;
                    $tabela->tabela_professores($tabela->mostra_lista_prof());
                ?>
            </tbody>
        </table>
    </div>
    <a href="cadastrar.php"><input type="submit" value="CADASTRAR NOVO" class="botao"></a>
</body>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Editar Cadastro</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="http://localhost/estudos_php/sistema_cad/controller/validacao_professor.php" method="POST">
                        <div>
                            <input type="text" hidden name="acao-edit" id="acao-edit" value="editar">
                            <input type="text" hidden name="acao-del" id="acao_del" value="deletar">
                            <div style="text-align:left">
                                ID<br>
                                <input type='text' class='botao' name='id' id="id">
                            </div>
                            <div>
                                Nome<br>
                                <input type='text' class='botao' name='nome' id="nome"><br>
                            </div>
                        </div>
                        <div>
                            <div>
                                E-mail<br>
                                <input type='email' name='email' class='botao' id="email"><br>
                            </div>
                            <div>
                                Celular<br>
                                <input type='tel' name='celular' class='botao' id="celular"><br>
                            </div>
                        </div>
                        <div>
                            <div>
                                CPF<br>
                                <input type='text' name='cpf' class='botao' id="cpf"><br>
                            </div>
                            <div>
                                Data de nascimento<br>
                                <input type='date' name='nasc' class='botao' id="nasc"><br>
                            </div>
                            <div>
                                Selecione o turno<br>
                                <select name='opcoes-turno' class='botao' id="opcoes-turno">
                                    <option name='turno' value='manha'>Manhã</option>
                                    <option name='turno' value='tarde'>Tarde</option>
                                    <option name='turno' value='noite'>Noite</option>
                                </select><br><br>
                            </div>
                        </div>
                        <input type="submit" value="Editar" class="botao">
                        <a href="lista.php"><input type="button" value="Acessar Lista" class="botao"></a>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button> -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    /** Redireciona para o formulário de edição */
    function editar(id) {

        $("#myModal").modal("show")
        /* $('#id').val(id)
        $('#nome').val(nome)
        $('#email').val(email)
        $('#celular').val(telefone)
        $('#cpf').val(cpf)
        $('#nasc').val(data_nasc)
        $('#opcoes-turno').val(turno) */

        // console.log("alguma coisa")

        $.ajax({
            url: '../../teste_ajax.php',
            method: 'GET',
            dataType: 'json',
            data: [
                id => id,
                nome => nome,
                email => email,
                celular => telefone,
                cpf => cpf,
                nasc => data_nasc,
                opcoes_turno => turno
            ],
            success: function response() {
                console.log("alguma coisa")
            },
            error: 
                console.log('erroooo')
            
        });

    }

    /** Redireciona novamente para a lista.php */
    function deletar(id) {
        if (id) {
            window.location.href = "lista.php";
        }
    }
</script>
<script src="http://localhost/estudos_php/sistema_cad/js/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</html>