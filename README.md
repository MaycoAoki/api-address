<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Clone o projeto

```bash
  git clone https://github.com/MaycoAoki/api-address.git
```

Entre no diretório do projeto

```bash
  cd api-address
```
Docker

```bash
./vendor/bin/sail up
```
# Caso o Docker não carregue as configurações basica use faça isso

Instale as dependências

```bash
  composer install
```

Faça a copia do env
```bash
cp .env.example .env
```
Use  esse comando para gerar a key
```bash
php artisan key:generate
```

# Banco de dados

Migrar o banco
```bash
 php artisan migrate
```

Essa e reponsavel por alimentar com 50 ceps validos aqui de Curitiba o banco de dados

```bash
php artisan db:seed --class=AddressSeeder
```

* **O front-end está funcinado localmente não foi adicinado no docker**

# api-address

Durante o desenvolvimento de uma API com Laravel e seu respectivo front end, adotei várias práticas e decisões técnicas 
para garantir um código limpo e modular. Ao seguir o padrão MVC, separei as responsabilidades de apresentação, lógica de 
negócios e manipulação de dados, o que facilitou a manutenção e escalabilidade do sistema.

A aplicação dos princípios SOLID foi essencial para garantir a coesão e baixo acoplamento do código. Utilizei a injeção 
de dependência para gerenciar as dependências entre os componentes, promovendo a reutilização e facilitando a substituição 
de implementações.

Na camada de front end, optei por tecnologias modernas como HTML5, CSS3 e JavaScript, combinadas com frameworks como Vue.js  
para criar uma interface intuitiva. Segui as diretrizes de design e usabilidade, garantindo uma experiência do usuário coesa e atraente.

Em suma, a combinação de boas práticas de desenvolvimento, código limpo, arquitetura sólida, injeção de dependência e uso eficaz 
de tecnologias front end resultou em um sistema robusto, escalável e de fácil manutenção.


