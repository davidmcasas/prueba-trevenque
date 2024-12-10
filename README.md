# Prueba Técnica para Trevenque
## Por David Martínez Casas

Se trata de una aplicación web realizada en Laravel 11 (PHP 8.3)

La aplicación se encuentra desplegada en: https://prueba-trevenque.davidmcasas.com

Nota: En el historial de GIT se puede ver los commit del ejercicio, para saber rápidamente qué archivos pertenecen
de base a Laravel, y qué archivos o cambios pertenecen al desarrollo del ejercicio.

## Desarrollo de la prueba

# 

## Pasos para desplegar en otro sistema:

### 1. Clonar el repositorio al servidor donde se vaya a probar e instalar dependencias.
```
composer install
```
En caso de conflicto por tener varias versiones de composer, utilizar:
```
composer2 install
```
Instalar paquetes de node necesarios para la compilación de js y css
```
npm install
```

### 2. Copiar ".env.example" y renombrarlo a ".env", y configurarlo.

En el archivo .env es necesario configurar las variables de entorno de la base de datos que se vaya a utilizar.
Para pruebas rápidas se puede utilizar SQLite (si el servidor lo permite) "DB_CONNECTION=sqlite".
Para MySQL: "DB_CONNECTION=mysql" y configurar el resto de variables DB_*

### 3. Generar clave hash de la aplicación.
```
php artisan key:generate
```
Laravel escribirá esta clave en el fichero .env en "APP_KEY"

### 4. Crear las tablas de la BBDD y ejecutar el Seeder.
```
php artisan migrate:fresh --seed
```

### 5. Compilar los CSS y JS de Vite

```
npm run build
```
Esto creara la carpeta public/build con los .js y .css compilados de la aplicación

Probado con Node 23

### 6. (Opcional) Ejecutar cacheado de Laravel
```
php artisan optimize
``` 
Esto también cachea las variables del .env, por lo que a partir de ahora, ante cualquier cambio en el .env
será necesario volver a ejecutar el cacheado.
