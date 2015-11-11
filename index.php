<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login Sistema</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .center-component{
            float: none;
            margin: 0 auto;
        }
    </style>
</head>
<body style="background: #333">
    <br>
    <div class="container">
        <div class="col-sm-6 col-md-6 col-lg-6 center-component">
            <div class="jumbotron" style="background: #FFF">
                <form action="" id="formLogin">
                    <div class="form-group">
                        <label for="usuario">Usuario: </label>
                        <input type="text" name="usuario" id="usuario" required class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" required class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
                <div class="row text-center loading" style="display: none">
                    <div class="col-sm-6 col-md-6 col-lg-6 center-component">
                        <img src="http://img.ffffound.com/static-data/assets/6/f71fbabb835aebca4489ba2e0d5cd6aff3ad528c_m.gif" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="row text-center erro alert alert-danger" style="display: none">

                </div>
            </div>
        </div>
    </div>


    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#formLogin").submit(function(event){
                $(".erro").hide();

                event.preventDefault();

                var usuario = $("#usuario").val();
                var senha = $("#senha").val();
                var retorno;
                var erro = false;

                $.ajax({
                    url: "app/usuario/doLogin",
                    data: {usuario: usuario, senha: senha},
                    dataType: "HTML",
                    type: "POST",
                    async: true,
                    beforeSend: function(){
                        $(".loading").show();
                    },
                    success: function(data){
                        retorno = data;
                    },
                    error: function(){
                        erro = true;
                    },
                    complete: function(){
                        $(".loading").hide();

                        if(erro) {
                            console.log("Erro");
                            mostrarMensagemErro("Encontramos um problema na requisição. Tente Mais tarde");
                            return;
                        };
                        console.log(retorno);
                        if(retorno == "true"){
                            console.log("OK");
                            location.href = "inicio.php";
                        }else{
                            mostrarMensagemErro("Usuario e/ou senha incorretos.");
                        }
                    }
                })
            });
        });

        var mostrarMensagemErro = function(message){
            $(".erro").html(message);
            $(".erro").show();
        }
    </script>
</body>
</html>