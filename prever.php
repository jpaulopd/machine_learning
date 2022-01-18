<?php

require_once 'vendor/autoload.php';

use Phpml\Dataset\CsvDataset;
use Phpml\Dataset\ArrayDataset;
use Phpml\CrossValidation\StratifiedRandomSplit;
use Phpml\Metric\Accuracy;

class Prever
{
    protected $previsao;

    public function __construct($algo)
    {
        $this->previsao = new $algo();
        //$this->previsao->setVarPath('C:\tmp');
    }

    public function predict($samples)
    {
        return $this->previsao->predict($samples);
    }

    public function train($samples, $labels)
    {
        $this->previsao->train($samples, $labels);
    }
}



function modelarDados($path): string
{
    $csvPath = strval($path);
    $treinamento = array();
    $html = "";
    $start_time = microtime(TRUE);

    // lendo o arquivo - 4 colunas - 3 de feature
    $dataset = new CsvDataset($csvPath , 3, true);

    //separando a 2 coluna - preco do ativo
    foreach ($dataset->getSamples() as $amostra)
    {
        $treinamento[] = $amostra;
    }

    //isolando as "respostas" - preço de fechamento
    $respostasTreino = new ArrayDataset($treinamento, $dataset->getTargets());

    //gerando uma aleatoriedade na ordem dos dados
    //para poder propciar ordens diferentes dos eventos
    //podendo testar varias combinacoes de resultados
    $conjuntoAleatorio = new StratifiedRandomSplit($respostasTreino, 0.01, 2);

    //gerando o conjunto de teste
    $conjuntoTeste = $conjuntoAleatorio->getTrainSamples();

    //gerando as respostas (preco de venda) dos dados que estao
    //no conjunto de teste
    $respostasTeste = $conjuntoAleatorio->getTrainLabels();


    //gerando as mostrar para usar na predicao
    $conjuntoPrevisao = $conjuntoAleatorio->getTestSamples();

    //gerando respostas das amostrar para testar a
    //acuracidade do algoritmo
    $previsaoRespostas = $conjuntoAleatorio->getTestLabels();      

    // $html .= "<p>------------------------------------------------------------ v.1 --------</p>";
    $html .= "<p>Conjunto de Treino: " . count($conjuntoTeste) ." linhas </p>";
    $html .= "<p>Conjunto para Previsão: " . count($conjuntoPrevisao) ." linhas </p>";
    $html .= "<p>Conjunto Total: " . count($treinamento) ." linhas </p>";
    // $html .= "<p>-------------------------------------------------------------------------</p>";

    //Instanciando o objeto e fazendo os testes!!
    $algoritmos = array( "Phpml\Classification\NaiveBayes",
                        "Phpml\Classification\KNearestNeighbors",
                        "Phpml\Classification\SVC",
                        "Phpml\Regression\SVR",
                        // "Phpml\Regression\LeastSquares"
                    );
      

    foreach ($algoritmos as $key => $value)
    {
        $html .= "<p>Algoritmo " . $value . ".</p>";
        $classificador = new Prever($value);
        $classificador->train($conjuntoTeste, $respostasTeste);
        $predictedLabels = $classificador->predict($conjuntoPrevisao);
        $score = Accuracy::score($previsaoRespostas, $predictedLabels)*100;
        $score = number_format($score, 2, ',', '.');
        $html .= "<p>Acurácia : " .   $score  . "% </p>";
        // $html .= "</br>";
    }

    $end_time = microtime(TRUE);
    $time_taken = ($end_time - $start_time) * 1000;
    $time_taken = round($time_taken, 0);
    $time_taken = $time_taken / 1000;
    $html .= "<p>Modelos gerados em " . $time_taken . " segundos</p>";

    return $html;
}
