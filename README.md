# Laravel Test Selection

Requisitos minimos

```(bash)
PHP > 7.3
Composer
Mysql v5.7+
Servidor Web => Nginx o Apache
```

## Procedimiento para instalar localmente

```(bash)
SSH:
git clone git@github.com:luisfruiz19/test_selection.gitgit@github.com:luisfruiz19/test_selection.git 

o

HTTPS:
git clone https://github.com/luisfruiz19/test_selection.git
```


## Procemiento 01

En la ruta raiz del proyecto abrir la terminal (Git Bash).

Via composer descargar las dependencias de laravel.

```(bash)
composer install
```

## Procedimiento 02

Sacar una copia del archivo .env.example

```(bash)
cp .env.example .env
```

Generar la llave secreta

```(bash)
php artisan key:generate
```


Crear Base de Datos en MYSQL
```(bash)
CREATE DATABASE mydatabase;
```

Abrir archivo .env y configurar la conexión a Base de Datos

```(bash)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mydatabase
DB_USERNAME=root
DB_PASSWORD=
```

## Crear las migraciones y Seeders (Datos de Fabrica)
Via terminal
```(bash)
php artisan migrate --seed
```

## Usar en máquina local



```(bash)
php artisan serve
```

Abrir en el navegador el siguiente link http://127.0.0.1:8000/


## Portafolio

[Click aqui](https://lfrportfolio.000webhostapp.com/).





## Licencia

Este proyecto es de código abierto bajo la licencia [MIT license](https://opensource.org/licenses/MIT).
