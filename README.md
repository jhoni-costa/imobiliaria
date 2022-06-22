# Dasafio Técnico - Desenvolvedor Back End - VistaSoft

Versão do PHP utilizada: 7.4.30 <br>
Banco de dados MySQL - Versão: 8.0.29<br>
Versão do Apache: 2.4.52 <br>
Sistema operacional em que foi desenvolvido: Ubuntu 22.04 LTE <br>


<h3>Para rodar o projeto no Linux:</h3>
<ul>
  <li>1 - Clonar o projeto dento do diretório /var/www/html </li>
  <li>2 - Criar o banco de dados e suas tabelas</li>
  <li>3 - Os scripts necessários para configuração do banco de dados estão dentro do projeto no diretório: app/Database/sql/sql_create_database_imobiliaria.sql</li>
  <li>4 - Configurar a string de conexão do MySql, encontra-se na classe Connection.php no diretório app/Database/Connection.php
  <li>5 - Dentro do metodo construtor deve-se informar o ip do servidor MySql, usuário e senha</li>
  <li>6 - Feito isso ao acessar  a url: localhost/imobiliaria se tem acesso ao projeto</li>
</ul>
