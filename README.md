# -JOB-Puesto-Junior
Con este ejercicio queremos ver cómo te desenvuelves analizando y estructurando proyectos

Este es el ejerecicio:
Tu jefe está loco, todos lo sabemos, porque sino, no es lógica la conversación que has tenido esta mañana con él.

Ha llegado con los pelos canosos, largos y revueltos y lo primero que te ha dicho es que tiene una gran idea innovadora: “quiere hacer un muro donde la gente pueda poner frases y que el resto de la gente las pueda ver”. Además de poder “marcar como favoritas las notas/frases” y poder listar las que están marcadas como favoritas.

Y te ha pedido a tí que te encargues de hacer el API del proyecto, es el momento de demostrarle que no eres un gallina!

Te has sentido como marty mcfly en regreso al futuro, y le has preguntado si conocía Twitter, pero él se ha negado a escucharte y ha seguido con lo suyo, así que te has resignado y has conseguido sacarle un listado de historias de usuario.

Como USUARIO quiero poder llamar al API, es decir, quiero poder tener un servidor local al que hacer una llamada HTTP y que me devuelva algo.
Como USUARIO quiero poder llamar al API para crear notas.
Como USUARIO quiero poder llamar al API para consultar las notas.
Como USUARIO quiero poder llamar al API para consultar una sóla nota.
Como USUARIO quiero poder llamar al API para marcar favorita una nota.
Como USUARIO quiero poder llamar al API para consultar las notas marcadas como favoritas.

En cuanto a tecnologías, te da libertad absoluta, bueno, más bien, no presta ninguna atención a ese punto, pero sí que te ha pedido que sea en PHP y POO porque ha oído por ahí que mola mucho, así que sientete libre para utilizar cualquier herramienta.

Para comprobar cómo has realizado el trabajo, tu jefe te pide que subas el proyecto a un sistema de control de versiones GIT (puede ser Github u otro) y que vayas haciendo subidas iteradas.

Y, por último, para no quedar mal delante del jefe, te recomendamos que realices pruebas unitarias sobre el proyecto. No es que sea obligatorio, pero ya sabes que siempre es bueno quedar bien con el jefe.
ostman
33

##############################################################################################################################

Tecnología aplicada: 
- Lenguaje: PHP 7.2.3 con framework CodeIgniter-3.1.11.
- Sistema operativo: Linux Ubuntu 16.04.6 LTS.
- Servidor: XAMPP for Linux 7.2.3 / Base de datos 10.1.31-MariaDB / Apache/2.4.29.
- Herramienta de pruebas: Para el funcionamiento de los servicios API postman / para revisar las consultas a la base de datos Libreria unit_test.

##############################################################################################################################

El aplicativo esta diseñado para dar servicios Web a base de unas APIs de consulta y de carga de datos, las APIs de consulta devuelven un archivo JSON, el cual pueden organizar y desplegar en cualquier vista. Las APIs de carga de dato trabajan con el método POST y al ser invocadas insertan directamente en la base de datos, en la tabla indicada para cada API.

- API para crear notas.
crearNota.php
http://localhost/ejercicio/index.php/Nota/crearNota
Datos a pasar por POST: 
nota: datos de la nota a crear.
idUsuario: numero identificador del usuario que crea la nota.

- API para consultar las notas.
getNota.php
http://localhost/ejercicio/index.php/Nota/getNota
Datos a pasar por POST:
Ningun dato ya que esta API trae un arreglo con todas las notas existentes en el sistema y las devuelve en un JSON.

- API para consultar una sola nota.
getNotaById.php
http://localhost/ejercicio/index.php/Nota/getNotaById
Datos a pasar por POST:
idNota: numero identificador de la nota que desea consultar.
Esta API devuelve un JSON con un único registro consultado.

- API para marcar favorita una nota.
marcarNota.php
http://localhost/ejercicio/index.php/Nota/marcarNota
Datos a pasar por POST:
idUsuario: numero identificador del usuario que marca la nota.
idNota: numero identificador de la nota que desea marcar.
Estos datos deben ser pasados por método POST en el body de la aplicación que la invoca y esto escribe en la tabla favoritas para marcar la nota indicada como favorita colocando en el campo favorita el valor de 1.

- API para consultar las notas marcadas como favoritas.
getNotaFavoritas.php
http://localhost/twitter2/index.php/Nota/getNotaFavoritas
Datos a pasar por POST:
idUsuario: numero identificador del usuario que ha marcado notas como favoritas.
Esta API devuelve un arreglo de todas las notas que el usuario ha marcado como favoritas y las sirve en un JSON.


BASE DE DATOS: twitter2
TABLAS:
- favoritas
  idUsuario int(4) NOT NULL
  idNota int(4) NOT NULL
  favorita int(1) NOT NULL
- notas
  id int(4) NOT NULL
  nota varchar(500) DEFAULT NULL
  idUsuario int(4) NOT NULL
PRIMARY KEY (`id`) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT
- usuarios
  id int(4) NOT NULL
  nombre varchar(250) NOT NULL
PRIMARY KEY (`id`) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT
