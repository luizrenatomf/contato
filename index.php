<?php

require_once "Email.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = new Email($_POST['nome'], $_POST['email'], $_POST['mensagem']);
    if(!$email->enviaEmail()) {
        echo "O e-mail não pode ser enviado.";
    } else {
        $email->recuperaEmail();
    }
}

if($_SERVER['REQUEST_METHOD'] == "GET") {

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Contato</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div id="area">
        <form method="post" id="formulario" autocomplete="off">
            <fieldset>
                <legend>Entre em contato</legend>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="José" />
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="jose@gmail.com" />
                <label for="mensagem">Mensagem:</label>
                <textarea name="mensagem" id="mensagem" rows="20" cols="60" placeholder="Escreva sua mensagem aqui..."></textarea>
                <input class="btn_submit" type="submit" value="Enviar" />
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php } ?> 
