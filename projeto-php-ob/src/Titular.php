<?php 

class Titular 
{
    private $cpf;
    private $nome;

    public function __construc(CPF $cpf, string $nome) //passa a receber objeto do tipo CPF, criado no desafio
    {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    public function recuperaCpf(): string 
    {
        return $this->cpf->recuperaNumero; //passa a recuperar o nmr do objeto cpf
    }

    public function recuperaNome(): string
    {
        return $this->nome;
    }

    private function validaNomeTitular(string $nomeTitular) //recebe uma string, que é o nome titular
    {
        if (strlen($nomeTitular) < 5) {
            echo "Nome precisa de pelo menos 5 caracteres";
            exit();
        }  
    }

}