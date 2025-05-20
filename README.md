# Collectiapp API

Collectiapp es una API innovadora diseñada para transformar la manera en que los usuarios gestionan sus colecciones personales de cómics y libros. Ofrece una experiencia sencilla, eficiente y segura para registrar, organizar y analizar bibliotecas personales.

## Requisitos del sistema

- **PHP**: >= 8.0
- **Composer**: >= 2.0
- **Node.js**: >= 14.x
- **Base de datos**: MySQL, PostgreSQL o cualquier base de datos compatible con Laravel.

## Instalación

1. Clona este repositorio:
   ```bash
   git clone https://github.com/tu-usuario/api_collectiapp.git
   cd api_collectiapp
   ```

- Instala las dependencias de PHP:
   ```bash
   composer install
   ```
- Copia el archivo de entorno y configura las variables:
   ```bash
   cp .env.example .env
   ```

- Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

- Configura base de datos en el archivo `.env` y ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```

- Llena la base de datos con datos iniciales (opcional):
   ```bash
   php artisan db:seed
   ```

- Inicia el servidor de desarrollo:
   ```bash
   php artisan serve
   ```
- Actualizar documentación en swagger
   ```bash
   php artisan l5-swagger:generate
   ```

## Uso

La API está documentada y puedes explorar sus endpoints utilizando herramientas como Postman o Swagger. Asegúrate de consultar la documentación completa en el directorio `docs`.

## Contribuciones

¡Las contribuciones son bienvenidas! Si deseas colaborar, por favor sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una rama para tu funcionalidad o corrección de errores:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```
3. Realiza tus cambios y haz un commit:
   ```bash
   git commit -m "Agrega nueva funcionalidad"
   ```
4. Envía tus cambios:
   ```bash
   git push origin feature/nueva-funcionalidad
   ```
5. Abre un pull request en GitHub.


# Errores comunes
### Error 1
Error al intentar conectar con BD mysql en DBBearer "Public Key Retrieval is not allowed"
### Solución:
Abra la conexión en  DBBearer, en la opcion Driver Propierties, busque el valor allowPublicKeyRetrieval y cambie este valor a FALSE

## Licencia

Este proyecto está licenciado bajo la [MIT License](LICENSE).

## Contacto

Si tienes preguntas o sugerencias, no dudes en contactarnos en [correo@collectiapp.com](mailto:correo@collectiapp.com).
