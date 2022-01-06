# PruebaTecnicaNexura
Prueba Técnica -Ángel Javier Moran Moran Proceso de selección Nexura- Cargo: Programador PHP

## información
Proyecto realizado en PHP con el framework  Laravel Version  8 y Mysql.

se utiliza la plantilla AdminLTE 3

Adicionalmente:

- Bootstrap v4.6.0
- DataTables 1.10.24
- jQuery JavaScript Library v3.6.0
- Fontawesome-free
- Sweetalert2


## requisitos
Servidor Apache con PHP ^7.3|^8.0
Mysql
Composer


## pasos de instalación

Se realiza la instalación de:

Servidor Apache con PHP ^7.3|^8.0
Mysql
Composer

una vez instalado se procede a clonar el repositorio, una vez clonado se ubica en la carpeta y se ejecuta el comando:

-composer install

luego que se instale todas las dependencias de laravel se procede a ubicar el archivo .env.example y este renombrar a .env

dentro de ese archivo se proceder a colocar los datos de conexión de la Base de datos.

luego de que este configurada la base de datos se procede a ejeuctar en la consola ubicada dentro de la carpeta raiz del proyecto  el comando:

- php artisan migrate --seed

el cual crear la base de datos a partir de las migraciones de laravel y ejecuta los seeder para llenar las tablas que se le crearo seeder.



