## System Product

Um sistema para gerenciar a criação, leitura, atualização e exclusão de produtos.


## Tecnologias

- **PHP com framework Laravel 7**
- **HTML e CSS com framework Bootstrap**
- **JavaScript e jQuery**
- **Base de dados: PhpMyAdmin**


## Execução

Para iniciar é necessário clonar o projeto do GitHub num diretório de sua preferência:
- https://github.com/williamsilva95/produto-system.git

Faça uma copia do arquivo .env.example e deixe apenas como .env na mesma pasta do projeto

Após crie uma database com o nome system_product

Com o terminal aberto na pasta do projeto, instale as dependências com o comando composer install

Utilize o comando php artisan migrate padra subir as migration para a database criada

Utilize o comando php artisan storage:link para criar um link simbólico de onde ficaram armazenado as imagens

Utilize o comando php artisan serve para gerar o link de inicialização do projeto



## Utilizando o sistema

Com o sistema já aberto, crie um usuário para poder ter acesso às funções
Antes de cadastrar qualquer produto é importante cadastrar as TAGS

O sistema permite:

- Criação, leitura, atualização e exclusão de produtos e tags
- Exportar para uma planilha do Excel os cadastros de produtos feitos no sistema
- Fazer upload de imagens


##Obrigado




