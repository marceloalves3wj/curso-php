<?php 

//

class Conta // a partir dessa classe, tenho um novo tipo de variável, podendo ser do tipo "Conta", ao invés de string,int,etc
{
    //$umaNovaConta = new Conta(); informa uma nova variável do tipo conta, que será armazenada na própria variável declarada
    //umaNovaConta = objeto
    //private string $cpfTitular; //atributos 
    //private string $nomeTitular; //qlqr pessoa que tiver o cpf,nome, saldo do tipo conta vai poder ter acesso
    private $titular;
    private float $saldo; // = 0; // na definição do atributo já seto um valor pra ele
    //privando o $saldo, só a própria conta pode acessar
    // uma boa prática é sempre termos propriedades privadas, e só métodos públicos
    private static $numeroDeContas = 0; // atributo da conta em si, e não dos objetos/instâncias criados

    public function __contruct(Titular $titular) //construtor torna os argumentos obrigatórios, sempre que tivermos que criar uma nova conta
    { 
        //não devemos executar muitas regras de negócio no construtor, e sim iniciar a nossa instância
        //$this->cpfTitular = $cpfTitular; 
        //$this->validaNome($nomeTitular);
        //$this->nomeTitular = $nomeTitular;
        $this->titular = $titular;
        $this->saldo = 0; 

        //$this->numeroDeContas++; // sempre que instanciar uma classe o nmr de contas vai ser incrementado
        // $this acessa a instância; nesse caso, devemos usar o a classe em si, como abaixo
        self::$numeroDeContas++; //incrementando toda vez que crio uma nova instância
                                // usando self tenho acesso a classe atual, ao invés de charmar a classe "Conta" 
    }

    public function sacar(float $valorASacar) { //métodos
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
        } else {
            $this->saldo -= $valorASacar; //dessa forma consigo alterar o saldo de contaASacar, ao invés de alterar o saldo da classe conta em si.
            
            
        }
    }

    public function depositar(float $valorADepositar): void {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
        } else {
            $this->saldo += $valorADepositar; //dessa forma consigo alterar o saldo de contaASacar, ao invés de alterar o saldo da classe conta em si.
        }
    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void 
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
        } else {
            $this->sacar($valorATransferir);
            $contaDestino->depositar($valorATransferir);
        }
    }

    public function recuperarSaldo(): float 
    {
        return $this->saldo;
    }

    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }

    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

    
    /* public function recuperarCpfTitular():string 
    {
        return $this->cpfTitular;
    }
           *nn tem mais utilidade por conta da nova classe Titular*

    public function recuperarNomeTitular(): string
    {
        return $this->nomeTitular;
    } */

    
    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }
}


    /* testando:
    require 'src/Conta.php;
    $contaUm = new Conta;
    $contaUm->depositar(500);
    $contaDois = new Conta();
    $contaUm->transferir(200, $contaDois);
    echo $contaUm->saldo;  echo $contaDois->saldo; */











/*
$primeiraConta = new Conta();

$primeiraConta->saldo = 200;
$primeiraConta->$cpfTitular= '111.111.111.11';
$primeiraConta->$nomeTitular= 'AiAi';

$segundaConta->saldo = 300;
$primeiraConta->$cpfTitular= '222.111.111.11';
$primeiraConta->$nomeTitular= 'o Mundão ta Perigoso dmais'; */