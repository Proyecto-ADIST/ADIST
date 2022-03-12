# ADIST
Proyecto Grupal ADIST



## Requisitos Desarrollo en Entorno Servidor

- [ ] __RA5__:  Deberá estar implementada con Symfony
- [ ] __RA7__:  Deberá implementar una API REST que permita hacer CRUD de alguna entidad (noticias, usuarios, recetas, reservas... dependiendo de lo que trate la aplicación)
- [ ] __RA8__:  Deberá usar AJAX
- [ ] __RA9__:  Deberá hacer uso de algún servicio externo (Google, APIs externas, Twitter, Facebook, Instagram, bit.ly...)

## Requisitos Desarrollo en el Entorno Cliente

- [ ] __RA5__: Objeto form, objetos relacionados con eventos, eventos, envíos y validación de formularios..etc. No tenéis que tocar todas las partes sino trabajar algún aspecto relacionado con formularios, eventos, validación... Por ejemplo formularios de contacto, formularios de alta y cosas de este tipo 
- [ ] __RA6__: Modelo de objetos DOM: objetos, acceso (esto ya lo hemos usado en clase), gestión de eventos (algunos/as ya lo han usado)
- [ ] __RA7__: AJAX: envío y recepción de datos de forma asíncrona.

## Requisitos Despliegue de Aplicaciones Web

- [ ] __RA4__: Transferencia de archivos. Subir código fuente a __Heroku__
- [ ] __RA5__: Parámetros de configuración. Configurar variables necesarias: __URI__ de base datos, ...
- [ ] __RA6__: Documentación y control de versiones con __Git__. Desarrollo con __Markdown__ de README.md 

## Requisitos Empresa e Iniciativa Emprendedora

- [ ] __RA1__: Iniciativa emprendedora, ideación y  prototipados de la idea. Actitudes personales y profesionales (fase I del proyecto de empresa)
- [ ] __RA2__: Análisis del entorno de una actividad. (Fase II Del proyecto de empresa)
- [ ] __RA3__: Puesta en marcha de una empresa. Determinación del mercado, elementos de marketing, forma jurídica y obligaciones legales (Fase lV y V del plan de empresa) 
- [ ] __RA4__: Gestión administrativa y económica-financiera (fase VI del proyecto de empresa). 


### Participantes
- Aranda Cañada, Antonio Jesús ► [haxezeta](https://github.com/haxezeta)
- Cabeza Acal, Francisco José ► [Langdom91](https://github.com/Langdom91)
- Cabeza Acal, Pablo ► [cabeezaa0](https://github.com/cabeezaa0)

## Instalación del proyecto:

1. Clonar el repositorio.
2. Ejecutar ``composer install`` para instalar las dependencias software.
3. Hacer una copia del archivo ``.env`` llamada ``.env.local`` y personalizar la configuración de la base de datos.
4. Ejecutar ``php bin/console doctrine:migrations:migrate`` para ejecutar las migraciones
5. Ejecutar ``php bin/console doctrine:fixtures:load`` para cargar los datos de ejemplo. (Te purga la base de datos)

# ADIST - Administración y Distribución 

Adist, es un software desarrollado a través de symfony alojado en un gestor de BBDD remoto y desplegado a través de Heroku que automatizará el proceso de compra-venta de una empresa que cuente con almacén y distribuidores, falicitará así la comunicación entra las partes y la gestión de datos desde almacén.

Tendrá distintas interfaces, para administrador, repartidor y almacenista.

Enlace a la aplicación desplegada: https://adist-app.herokuapp.com/

## Comenzando 🚀

Para poder echar un vistazo y ver como funciona:

1. Instala symfony y actualiza composer
2. Clona el proyecto 
3. Importa los datos a tu base de datos local a través de los comandos:
    - 'php bin/console doctrine:migrations:migrate' para ejecutar las migraciones.
    - 'php bin/console doctrine:fixtures:load' para cargar los datos de ejemplo.
4. Ejecuta 'symfony server:start' para arrancar el proyecto.

Mira **Despliegue** para conocer como desplegar el proyecto.

## Despliegue 📦

Para desplegar recomandamos Heroku y seguir el siguiente tutorial:
https://devcenter.heroku.com/articles/deploying-symfony4

Recuerda cambiar de dev a prod e importar las variables de entornos en la pestaña settings de la interfaz de Heroku.

## Construido con 🛠️

* Symfony - El framework web usado
* PHP, HTML, TWIG, AJAX
* RemoteMySql - Base de datos
* Herokku - Despliegue

## Autores ✒️

* **Antonio Jesús Aranda Cañada** ► [haxezeta](https://github.com/haxezeta)
* **Pablo Cabeza Acal** ► [cabeezaa0](https://github.com/cabeezaa0)
* **Francisco José Cabeza Acal** ► [Langdom91](https://github.com/Langdom91)


## Gracias a compañeros de clase y profesores por su inestimable ayuda en el desarrollo del proyecto 🎁

