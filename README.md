# teste-laravel-api

Desenvolva uma aplicação PHP 7+ utilizando o framework Laravel para resolver o seguinte problema:

Uma seguradora precisa comercializar o seu mais novo produto, seguro residencial. A comercialização deste produto estará disponível apenas para casas e apartamentos, as seguintes informações deverão ser recepcionadas através de uma API utilizando o padrão REST:

1.Logradouro do imóvel
2.Bairro
3.Município
4.Estado
5.CEP ( Deve validar o padrão 00000-000 )
6.Tipo do imóvel(Apartamento ou casa)
7.Nome do proprietário
8.CPF do proprietário(Deve ser validado se o CPF é válido)

Para isso, utilize o banco de dados MySQL ou Postgres(ambos qualquer versão) e disponibilize os seguintes métodos:
1.Cadastrar
2.Editar
3.Consultar(Por CPF)
4.Listar

É importante que esta API seja protegida e disponível apenas para usuários autenticados, para isto deve ser implementado o padrão de autenticação JWT(Json Web Tokens). O front da aplicação será criado por um parceiro comercial da seguradora, logo, deve ser disponibilizado a documentação desta API. Melhorias no processo/serviço serão vistas como diferencial. 

Faça um FORK deste projeto e quando terminar faça um PULL REQUEST para avaliarmos seu teste.

Boa sorte!
