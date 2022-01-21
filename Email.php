<?php

class Email
{
    private string $nome;
    private string $email;
    private string $mensagem;

    public function __construct($nome, $email, $mensagem)
    {
        $this->verificaNome($nome);
        $this->verificaEmail($email);
        $this->verificaMensagem($mensagem);

        $this->nome = $nome;
        $this->email = $email;
        $this->mensagem = $mensagem;
    }

    private function verificaNome($nome)
    {
        if(strlen($nome) < 3) {
            echo "O nome informado não é válido!";
            exit();
        }
    }

    private function verificaEmail($email) 
    {
        if(isset($email) && empty($email)) {
            echo "O e-mail não foi preenchido corretamente.";
            exit();
        }
    }

    private function verificaMensagem($mensagem)
    {
        if(strlen($mensagem) < 10) {
            echo "A mensagem não pode ter menos que 10 caracteres.";
            exit();
        }
    }
    
    public function enviaEmail()
    {
        $destino = "luizrenatomf@gmail.com";
        $assunto = "Contato";
        $corpo = "Nome: {$this->nome}" . PHP_EOL .
                "Email: {$this->email}" . PHP_EOL .
                "Mensagem: {$this->mensagem}";
        $header = "From: {$destino}" . PHP_EOL .
                  "Replay-To: {$this->email}" . PHP_EOL .
                  "X-Mailer:PHP/" . phpversion();
        if(!mail($destino, $assunto, $corpo, $header)) {
            return false;
        }
    }

    public function recuperaEmail()
    {
        echo "Nome: {$this->nome}" . PHP_EOL .
             "E-mail: {$this->email}" . PHP_EOL .
             "Mensagem: {$this->mensagem}";
    }


}
