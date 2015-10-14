# Web Logger
### ¿Que es Web Logger?
Web Logger es una herramienta creada con PHP para registrar todos los request e información de un sitio web, para debugearlo y analizarlo de manera simple.

Web Logger está pensada para poder tener un reporte de toda la actividad que pasa todos los sitios web en donde se incluya esta herramienta.
Sirve para debugear una aplicaciones PHP RestFull, sitio web, CMS, eCommerce, etc.

También se puede usar para crear logs de los sitios web y analizar intentos de ataques.

## Instalación

### Primer paso:
git clone git@github.com:gonzalo340/weblogger.git

### Segundo paso:
Configurar en el archivo config.inc.php las constantes: LOG_FOLDER_NAME, LOG_FILENAME y LOG_PATH.

### Tercer paso:
Para que no pida autenticación, eliminar el archivo .htaccess. En caso contrario, configurar la directiva AuthUserFile de .htaccess con la ruta correspondiente del archivo donde se encuentran los usuarios.

### Listo
Con realizar estos 3 pasos ya debería quedar pronto para funcionar. Lo unico que falta ahora es incluir una linea de codigo en los scripts de los sitios web que van a usar esta herramienta.

### Codigo para incluir en sus aplicaciones PHP:
$weblogger_register_path = "/ruta/absoluta/de/weblogger/register.php"; require_once $weblogger_register_path;
