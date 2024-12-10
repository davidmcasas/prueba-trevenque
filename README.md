# Prueba Técnica para Trevenque
## Por David Martínez Casas

Se trata de una aplicación web realizada en Laravel 11 (PHP 8.3)

La aplicación se encuentra desplegada en: https://prueba-trevenque.davidmcasas.com

Nota: En el historial de GIT se puede ver los commit del ejercicio, para saber rápidamente qué archivos pertenecen
de base a Laravel, y qué archivos o cambios pertenecen al desarrollo del ejercicio.

## Desarrollo de la prueba

### 1.1. Backend
Migracion: [2024_12_10_083745_create_app_tables.php](database/migrations/2024_12_10_083745_create_app_tables.php)

Los nombres de las columnas los he puesto en inglés por estandarización.

El enunciado dice: "La tabla debe tener claves primarias y foráneas, así como los índices necesarios para optimizar las consultas de búsqueda."

Pero considero que al existir una única tabla no es necesario usar claves foráneas. He creado un índice sobre la columna name. También se podría haber hecho la columa name unique (se crea el índice automáticamente para los campos unique), pero he preferido no hacerlo unique ya que el enunciado no lo pide.

### 1.2. Api

Rutas de Api: [api.php](routes/api.php)
Controlador de Productos: [ProductController.php](app/Http/Controllers/ProductController.php)

Por ejemplo, la ruta GET devuelve todos los productos: https://prueba-trevenque.davidmcasas.com/api/products

### 1.3. Git
He incluido este readme. He creado una rama aparte "task_readme" que solo actualiza este apartado del readme. A modo de demostración del uso de ramas y pull requests.

### 2.1 Frontend

He creado dos vistas principales:

Índice (Productos): [index.blade.php](resources/views/index.blade.php)
Nuevo Producto: [new.blade.php](resources/views/new.blade.php)

Como se puede ver en el controlador de productos, el index utiliza la misma funcion de la API get para cargar el listado de productos.
Y el formulario de nuevo producto apunta a create, que a su vez utiliza la API post.

Los checkboxes actualizan el estado del campo active sin tener que recargar la página, mediante llamadas AJAX con jQuery. Me hubiera gustado
implementar un feedback visual (un toast para notificar al usuario de que el active ha cambiado exitosamente), pero no me ha dado tiempo a esto.

El formulario de nuevo producto valida los requisitos indicados en el enunciado mediante un Request personalizado:
[ProductRequest.php](app/Http/Requests/ProductRequest.php)

Los mensajes de error del formulario pueden aparecer en inglés porque son los mensajes por defecto de Laravel, se pueden traducir pero no me he parado a ello.

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
La opción -seed creará un producto de ejemplo.

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
