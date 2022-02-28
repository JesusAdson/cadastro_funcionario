
## Iniciando

Para iniciar o projeto em seu ambiente,
use esse comando para clonar em sua máquina.

```bash
  git clone https://github.com/JesusAdson/cadastro_funcionario.git
```

Após ter clonado o projeto abra em um editor e realize os seguintes passos.
1. Copie o conteúdo do arquivo .env.example.
2. Crie um arquivo .env e cole o conteúdo copiado aqui.
3. Faça as seguintes alterações.
- `DB_HOST=mysql`
4. Crie uma conexão com o banco de dados montado pelo sail.
  - Porta: 3306
  - database_name = laravel (ou preferência)
  - user: root (ou preferência)
  - password: root (ou preferência)
5. Mude no .env as seguintes variáveis.
  - `DB_DATABASE=laravel`
  - `DB_USERNAME=root`
  - `DB_PASSWORD=root`
## Iniciando o Laravel Sail

Abra o terminal e dentro do diretório que clonou o arquivo,
execute o seguinte comando para instalar as dependências.

```
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Depois de ter executado o comando acima e baixado todas as dependências,
execute o comando abaixo para criar um alias (apelido) para o sail.

```
  alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

Caso não queira, basta trocar onde tiver nos demais comandos abaixo trocar o sail por ./vendor/bin/sail.

Agora inicie o sail com o seguinte comando.

```
  sail up -d
```

Após ter instalado todas as dependências, ter iniciado o sail, e já com o alias configurado, execute o comando abaixo para gerar uma key.

```
  sail php artisan key:generate
```

Agora basta então, abrir no navegador e acessar o `localhost`.


## Atenção

Vale ressaltar que caso exista algum serviço utilizando as mesmas portas que o laravel sail haverá conflitos.

Portas utilizadas: 
 - `3306 - mysql`
 - `8025 - mailhog`
 - `80   - sail`
