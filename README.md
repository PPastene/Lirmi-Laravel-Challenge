# Lirmi Laravel Challenge
## Dependencias
El sistema hace uso de las siguientes dependencias
- PHP 7.4 FPM
- Laravel v7.24.0
- VueJS v2.6.11
- Axios v0.19
- Bulma CSS v0.9.0

El sistema hace uso de Nginx como servidor web y PostgreSQL como motor de base de datos. Además se tiene a dispocisión archivos de Docker para levantar el sistema en contenedores
## Instalación
- Clonar proyecto
- Copiar archivo .env.example y renombrar a .env
- En la linea 9 donde está la configuracion de la base de datos reemplazar con lo siguiente

	    DB_CONNECTION=pgsql
	    DB_HOST=postgres
	    DB_PORT=5432
	    DB_DATABASE=lirmi_exercise
	    DB_USERNAME=lirmi
	    DB_PASSWORD=lirmi

- Levantar contenedores con `docker-compose up -d`
- Entrar al contenedor lirmi_laravel_php con `docker exec -it lirmi_laravel_php bash`
- Instale las dependencias de PHP con `composer install`
- Instale las dependencias de Javascript con `npm install`
- Crear llave de aplicación de Laravel con `php artisan key:generate`
- Crear tablas de base de datos con `php artisan migrate`
- Compile los assets de Javascript y CSS con `npm run dev` (puede usar `npm run prod` para compilar a producción)
- Para hacer pruebas unitarias ejecute `php artisan test`

## Explicación
- La decisión de ocupar Nginx como servidor web, PostgreSQL como motor de base de datos y Bulma CSS como framework CSS es para mantener los lineamientos propios del sistema Lirmi.
- Se crearon rutas de API para separar la carga de las vistas de Blade con la obtención, inserción y eliminación de registros provenientes de los componentes de VueJS.
- Si bien se decidió por hacer la eliminación de registros en la base de datos de forma fisica por un tema de tiempo, se tenía en consdieración implementar un Soft Delete para evitar la inconsistencia de datos pero debido a que este no era un problema aqui pues no se decidió con implementar aquello.
- Montar el sistema bajo el sistema de contenendores permite tener aislado los distintos elementos que componene el sistema del sistema operativo principal además de evitar instalar programas que alteren o perjudiquen su rendimiento, además los contenedores deberían funcionar en otros sistemas operativos sin ningun problema.
