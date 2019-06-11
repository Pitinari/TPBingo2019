# Trabajo Práctico Integrador - 2019

## Integrantes: Tomás Pitinari - Sebastián I. Rodriguez


1.- El archivo .gitignore especifica que archivos debe ignorar git al hacer un commit. Es decir el commit se realiza como si esos archivos no existieran.

En cuanto a limitaciones no puede ignorar archivos ya trackeados por git. El archivo .gitignore tampoco puede ignorarse a si mismo.


2.- El archivo .travis.yml contiene las opciones de configuracion que necesita Travis para poder ejecutar el proyecto.

Explicacion de cada linea:

language: php                                 //Especifica el lenguaje de programacion usado
php:										  //Version del lenguaje
  - 7.2

install:									  //Comandos a ejecutar durante el paso de installacion
  - composer update --prefer-source			  //Indica al composer que debe clonar el codigo fuente de los 
  											  //paquetes

script:										  //Comandos a ejecutar durante el paso script
  - php vendor/bin/phpunit --color tests	  //Ejecuta las pruebas y colorea la salida por terminal


3.- 
  - El composer.json describe las dependencias del proyecto, ademas de contener otro metadatos. 
  - La diferencia que tiene con el composer.lock es que el composer.lock almacena las versiones exactas de las dependencias, de manera que al compartir el proyecto con otros colaboradores, todos utilizen las mismas versiones.
  - El autoloader se encarga de cargar automaticamente las bibliotecas del proyecto, a medida que se vayan necesitando.
  - La propiedad PSR-4, contiene los namespaces del proyecto. Un namespace es un 'alias' que se le asigna un path. De esta manera cuando el autoloader encuentre una referancia al alias, lo reemplazara por el path correspondiente.


4.- El equivalente a PHP Composer en NodeJS se denomina npm. En cuanto a Ruby el administrador de paquetes por defecto se denomina RubyGems. Sin embargo, pudimos encontrar otras alternativas como Bundler.


5.- La palabra namespace crea un espacio de nombres dentro de la carpeta especificada. Esto permite utilizar todas los archivos de php dentro de este espacio de nombres sin necesidad de incluirlos explicitamente.


6.- El comentario {@inheritdoc} en el caso de CartonJs y CartonEjemplo significa que las clases heredan la documentacion de sus superclase, en este caso CartonInterface. Esto facilita la creacion de la documentacion de la API.


7.- Para crear una clase donde poder ejecutar pruebas utilizando phpunit es requisito extender a la clase TestCase. Esto es porque esta clase contiene las funcionalidades basicas para que phpunit pueda ejecutar la prueba. 
Cuando decimos que una clase extiende a otra nos referimos que la clase que extiende puede utilizar las funcionalidades, con funcionalidades nos referimos a todos los metodos y propiedades no privados, de la clase extendida. 
