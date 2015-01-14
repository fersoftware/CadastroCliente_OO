--------------------------------
exemplo para acesso:
cd src
cd Fersoftware
php -S 127.0.0.1:8020
---------------------------------

-------------------------------------------
DESAFIO 03 - Refatoração <br>
--------------------------------------------
Refatore as classes utilizadas de seu projeto para que as mesmas trabalhem com namespaces.

Verifique se dentro de seu projeto há a necessidade de se trabalhar com classes abstratas.

Não se esqueça de criar a estrutura de diretórios, nome de arquivos e classes seguindo a PSR-0 (www.php-fig.org).

Faça a implementação do autoload para que você não precise mais trabalhar com require/include para a chamada de suas classes.

Deixe todo o fonte de sua aplicação no mesmo nível que o DocumentRoot do servidor web. Deixe a pasta que está visível para web (seu DocumentRoot) apenas com o index.php e os demais assets(css, javascript e imagens).



-----------------------------------------------------------------------
SEGUE O DESAFIO ABAIXO FEITO AGORA SEGUNDA PARTE SEGUE ACIMA
----------------------------------------------------------------------
Tipos de clientes

Agora que você já tem seu cadastro de cliente, você deverá também aceitar clientes Pessoa Jurídica em sua listagem.

Não se esqueça de trabalhar com os modificadores de acesso e os getters e setters.

No momento da listagem dos clientes, você deve indicar em uma das colunas se o cliente é pessoa física ou jurídica.

Ambos os tipos devem implementar uma interface onde seja possível classificar o grau de importância do cliente para a empresa (ex: cliente 1,2,3,5 estrelas).

Você também terá a opção de criar clientes que utilizão endereço específico de cobrança, nesse caso, crie uma interface para que esses tipos de clientes possam implementar.
