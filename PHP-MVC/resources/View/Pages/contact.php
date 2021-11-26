
<!DOCTYPE html>

<html>
    <head lang="pt-br">
        <title></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles\css\all.css">
        <link rel="stylesheet" href="styles\style.css">
        <link rel="preconnect" href="/https://fonts.googleapis.com">
        <link rel="preconnect" href="/https://fonts.gstatic.com" crossorigin>
        <link href="/https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <!-- <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="js\jquery.js"></script> 
        <script src="js\bootstrap.min.js"></script>
        <script src="js\bootstrap-select.min.js"></script>
       
        <script src="js\jquery.mask.js"></script>
       
        <script>
            $(document).ready(function () {
                $('select').selectpicker();
                
                //$('#data_saida').selectpicker();
                carrega_dados('destinos');
                function carrega_dados(tipo, cat_id = ''){
                    
                    $.ajax({
                        url: "resources/View/Pages/carrega_dados.php",
                        method: "POST",
                        data: {tipo: tipo, cat_id: cat_id},
                       
                        dataType: "json",
                       
                        success: function (data)
                        {
                            var html = '';
                            for (var count = 0; count < data.length; count++){
                                html += '<option value="' + data[count].nome + '">' + data[count].nome + '</option>';
                            }
                            if (tipo == 'destinos'){
                                $('#destinos').html(html);
                                $('#destinos').selectpicker('refresh');
                            } else {
                                $('#data_saida').html(html);
                                $('#data_saida').selectpicker('refresh');
                            }
                        }
                    })
                }
                $(document).on('change', '#destinos', function () {
                    var cat_id = $('#destinos').val();
                    carrega_dados('data_saida', cat_id);
                });
            });
        </script>
    </head>
    <body>
    

        <br />
        <form method="post" class="form-contato">
        <h3>Dados Pessoais</h3>
        <label for="nome" >Nome<span class="require">*</span></label>
        <input type="text" id="nome" name="nome" placeholder="Insira seu nome" required>
        <label for="email" >Email<span class="require">*</span></label>
        <input type="email" id="email" name="email" placeholder="Insira seu e-mail" required>
        <label for="celular">Celular<span class="require">*</span></label>
        <input type="text" id="celular" name="celular" placeholder="(00) 00000-0000" required>
        <label for="cpf">CPF<span class="require">*</span></label>
        <input type="text" id="cpf" name="cpf" placeholder="Insira seu CPF" required>
        <div class="select">
            <label>SELECIONE UM DESTINO<span class="require">*</span></label>
            <select name="destinos" id="destinos" title="Selecione o Destino"></select>
            <label>SELECIONE UMA DATA<span class="require">*</span></label>
            <select name="data_saida" id="data_saida"  title="Selecione a Data"></select>
        </div>
          <button type="submit" class="botao">ENVIAR</button>
    </form>
    <script>
            $("#celular").mask("(00) 00000-0000");
            $("#cpf").mask("000.000.000-00");
            var navLinks = document.getElementById("navLinks");
            function showMenu(){
                navLinks.style.right = "0";
            };
            function hideMenu(){
                navLinks.style.right = "-200px";
            };
                 
        </script>
    
    </body>
</html>
