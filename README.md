# Integração de PHP com Machine Learning 
> Status do Projeto: Concluido :heavy_check_mark:

<img src="https://github.com/jpaulopd/machine_learning/blob/197008c0a8d9ef87aa3de6420f82869d69a21851/img/intro.JPG">

## Descrição do Projeto
<p align="justify"> Projeto desenvolvido para a matéria de Programação para Internet 2 do Insituto Federal de Brasília 2021/2º Semestre. O objetivo da aplicação é demonstrar a integração da linguagem PHP com a biblioteca PHP-ML que oferece técnicas de aprendizado de máquina (Machine Learning) diretamente no PHP sem a necessidade de qualquer outra linguagem tradicionalmente utilizada para isso como o Python </p>

## Aplicações do projeto
- Utilização de biblioteca de machine learning diretamente em PHP sem necessidade de integrar outras lingugagens de programação a uma aplicação.
- Estudo de preços de ativos financeiros de modo a identificar oportunidades de investimentos.
- Facilitar o estudo de bases de dados novas, podendo alterar parâmetros das técnicas rapidamente sem a necessidade utilizar um JUPYTER ou outra solução.
- Utilizar somente PHP no aprendizado de máquina, sem necessidade de aprender R ou Python.

## Tecnologias utilizadas
<img src="https://img.shields.io/static/v1?label=html&message=frontend&color=blue&style=for-the-badge&logo=HTML"/>
<img src="https://img.shields.io/static/v1?label=css&message=frontend&color=blue&style=for-the-badge&logo=CSS"/>
<img src="https://img.shields.io/static/v1?label=bootstrap&message=frontend&color=blue&style=for-the-badge&logo=BOOTSTRAP"/>
<img src="https://img.shields.io/static/v1?label=PHP&message=backend&color=gree&style=for-the-badge&logo=PHP"/>
<img src="https://img.shields.io/static/v1?label=COMPOSER&message=backend&color=gree&style=for-the-badge&logo=COMPOSER"/>
<img src="https://img.shields.io/static/v1?label=PHP-ML&message=lib&color=sucess&style=for-the-badge&logo=PHP-ML"/>
<img src="https://img.shields.io/static/v1?label=VSCODE&message=IDE&color=blueviolet&style=for-the-badge&logo=IDE"/>

## Como usar o projeto
1. Tenha um equipamneto com PHP e o Composer instalados.
3. Baixe o projeto para sua máquina.
4. Acesse o terminal e vá até sua pasta onde está o projeto.
5. Execute o comando :
```php 
composer require php-ai/php-ml 
```
6. Depois o comando:
```php 
php -S localhost:8080 
```
7. Acesse seu navegador na rota localhost:8080
8. Pronto! A página está pronta para ser usada!

## Como utilizar a página
1. Preparar base de dados utilizando o [Google Finance](https://support.google.com/docs/answer/3093281?hl=pt-BR) contendo os dados na seguinte ordem.
* Preço Mínimo
* Preço Máximo
* Volume
* Preço Fechamento
2. Como exemplo deixo essa [planilha](https://docs.google.com/spreadsheets/d/1VD9IMs7Ym6HtK36OCathpggsGsgzVya1EVJVnidPQms/edit?usp=sharing) como referência para prepar os dados.
3. Baixar o arquivo como csv.
4. Acessar a rota localhost:8080 no seu navegador.
5. Clicar no botão "Procurar" e navegar até a pasta onde está o arquivo .csv
6. Clicar no botão "Modelar!" e aguardar.
7. Pronto! O resultado é apresentado em tela.

## :warning::warning::warning: Sobre os resultados apresentados :warning::warning::warning:
A métrica utilizada em cada tipo de técnica foi a acurácia que é uma medida de avaliação da capacidade de uma técnica acertar uma previsão.
Aprendizado de máquina envolve muito estudo sobre cada tipo de dados. 
A solução apresentada não buscou em nenhuma hipótese otimizar as técnicas de aprendizado de máquina utilizadas.
Dito isso, fica evidente que os resultados são insatisfatórios para qualquer tipo de ativo financeiro a ser modelado, pois a capacidade de acertar da melhor técnica não passa em média de 30%.

## Cenas dos próximos capítulos - Roadmap
- [X] Testar alterações na proporção entre o conjunto de treinamento e testes
- [ ] Testar alterações nos parâmetros de cada técnica
- [ ] Testar uso de técnicas de séries temporais
- [ ] Apresentar resultados da predição de cada tipo de modelo
- [ ] Apresentar resultados de maneira mais amigável ao usuário





