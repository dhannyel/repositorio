Repositorio para Demos HTML

## Pasos para ejecutar este proyecto:

1. Haga una copia de este repositorio: https://github.com/dhannyel/repositorio

2. Instala las dependencias de PHP

```
  composer install
```
 
3. Copia el archivo `.env.example` a `.env` y configura los valores de la base de datos:

   ```
   cp .env.example .env
   ```

4. Genera la clave de aplicación: Necesario para que Laravel pueda encriptar sesiones, contraseñas

	```
   php artisan key:generate
  ```

5. Migra la estructura de la base de datos:

   ```
   php artisan migrate
   ```

6. Levantar Servidor Local

   ```
   php artisan serve
   ```