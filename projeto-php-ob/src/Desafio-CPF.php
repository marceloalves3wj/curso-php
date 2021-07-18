<?php

class CPF
{
    private string $numerocpf;

    public function __contruct(string $numerocpf) //validação cpf
    {
        $numerocpf = filter_var($numerocpf, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($numerocpf === false) {
            echo "Cpf inválido";
            exit();
        }
        $this->numerocpf = $numerocpf;
    }

    public function recuperaNumero(): string   //função que retorna o cpf
    {
        return $this->numerocpf;
    }
}