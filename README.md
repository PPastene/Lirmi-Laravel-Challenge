# Lirmi Laravel Challenge

## Requisitos
- Todo
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
- Crear llave de aplicación de Laravel con `php artisan key:generate`
- Crear tablas de base de datos con `php artisan migrate`

## Explicación
- TODO
