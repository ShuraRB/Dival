<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

//************************************************************************************
//********************************* CONSTANTES PANEL *********************************
//************************************************************************************

//RUTAS BASE
define("RECURSOS_PANEL_CSS", "recursos_panel/css/");
define("RECURSOS_PANEL_SCSS", "recursos_panel/scss/");
define("RECURSOS_PANEL_JS", "recursos_panel/js/");
define("RECURSOS_PANEL_IMG", "recursos_panel/img/");
define("RECURSOS_PANEL_VENDOR", "recursos_panel/vendor/");

//General Panel y portal
define("RECURSOS_CONTENIDO", "recursos_contenido/");

//***************************************************************************************** */
//************************************Constantes Portal************************************ */
//***************************************************************************************** */

//Rutas base
define("RECURSOS_PORTAL_CSS","Recursos_Portal/css/");
define("RECURSOS_PORTAL_FONTS","Recursos_Portal/fonts/");
define("RECURSOS_PORTAL_JS","Recursos_Portal/js/");
define("RECURSOS_PORTAL_IMAGES","Recursos_Portal/images/");
define("RECURSOS_PORTAL_PLUGINS","Recursos_Portal/plugins/");

//************************************************************************************
//********************************* CONSTANTES PANEL / TAREA**************************
//************************************************************************************
define("TAREA_DASHBOARD",'tarea_dashboard');
define("TAREA_USUARIOS",'tarea_usuarios');
define("TAREA_USUARIO_NUEVO",'tarea_usuario_nuevo');
define("TAREA_USUARIO_DETALLES",'tarea_usuario_detalles');
define("TAREA_CLIENTE",'tarea_cliente');
define("TAREA_CLIENTE_NUEVO",'tarea_cliente_nuevo');
define("TAREA_CLIENTE_DETALLES",'tarea_cliente_detalles');

define("TAREA_CATALOGO",'tarea_catalogo');
define("TAREA_CATALOGO_SAMSUNG",'tarea_catalogo_ samsung');
define("TAREA_CATALOGO_CABALLERO",'tarea_catalogo_caballero');
define("TAREA_CELULAR_NUEVO",'tarea_celular_nuevo');
define("TAREA_CELULAR_DETALLES",'tarea_celular_detalles');
define("TAREA_OFERTA",'tarea_oferta');
define("TAREA_PERFIL",'tarea_perfil');


//************************************************************************************
//********************************* CONSTANTES PORTAL / PAGINA************************
//************************************************************************************
define("PAGINA_INICIO",'pagina_inicio');
define("PAGINA_SAMSUNG",'pagina_samsung');
define("PAGINA_APPLE",'pagina_apple');
define("PAGINA_GALERIA",'pagina_galeria');
define("PAGINA_CONTACTO",'pagina_contacto');




//****************************************************************************************
//********************************* CONSTANTES GENERALES *********************************
//****************************************************************************************
//ROLES
define("ROL_SUPERADMIN",  array('nombre'=>'Superadmin',      'clave' => '784'));
define("ROL_OPERADOR",    array('nombre'=>'Operador',        'clave' => '444'));

define("ROLES", array(
                        784 => 'Operador',
                        444 => 'Super Administrador'
                  ));

define("SEXO", array(
                        0 => 'Femenino',
                        1 => 'Masculino'
                  ));

//CONSTANTES PARA DETEMINAR EL SEXO DEL USUARIO
define("SEXO_FEMENINO", 0);
define("SEXO_MASCULINO", 1);

//CONSTANTES PARA LAS ALERTAS
define("SUCCESS_ALERT", 1);
define("DANGER_ALERT", 2);
define("WARNING_ALERT", 3);
define("INFO_ALERT", 4);

//CONSTANTES PARA VALIDAR EL ESTATUS 
define("ESTATUS_HABILITADO",2);
define("ESTATUS_DESHABILITADO", 0);

//PERMISO A LAS TAREAS POR ROLES
define("PERMISOS_ADMIN", array(
    TAREA_DASHBOARD,
    TAREA_USUARIOS,
    TAREA_USUARIO_NUEVO,
    TAREA_USUARIO_DETALLES,
    TAREA_CLIENTE,
    TAREA_CLIENTE_NUEVO,
    TAREA_CLIENTE_DETALLES,
    TAREA_CATALOGO,
    TAREA_CATALOGO_SAMSUNG,
    TAREA_CELULAR_DETALLES,
    TAREA_CATALOGO_CABALLERO,
    TAREA_OFERTA,
    TAREA_PERFIL
));

define("PERMISOS_OPERADOR", array(
    TAREA_DASHBOARD,
    TAREA_CLIENTE,
    TAREA_CLIENTE_NUEVO,
    TAREA_CLIENTE_DETALLES,
    TAREA_CATALOGO,
    TAREA_CATALOGO_SAMSUNG,
    TAREA_CATALOGO_CABALLERO,
    TAREA_OFERTA,
    TAREA_CELULAR_DETALLES,
    TAREA_PERFIL
));

define("COMPAÑIA_CELULAR", array(
                        1 => 'Telcel',
                        2 => 'Movistar',
                        3 => 'Unefon',
                        4 => 'Pollofon',
                        5 => 'AT&T',
                  ));

define("MARCA_CELULAR", array(
                        0 => 'Caballero',
                        1 => 'Samsung',
                  ));

define("CELULAR_DESTACADO", array(
                    0 => 'No',
                    1 => 'Si'
                ));

define("MARCA_CELULAR_SAMSUNG",1);
define("MARCA_CELULAR_APPLE",0);

//RUTAS BASE 
define("RECURSOS_CONTENIDO_IMAGE", "recursos_contenido/imagenes/");
define("RECURSOS_CONTENIDO_PLUGINS", "recursos_contenido/plugins/");

//RUTAS PARA LAS IMAGENES
define("IMG_DIR_USUARIOS","recursos_contenido/imagenes/usuarios");
define("IMG_DIR_CLIENTE","recursos_contenido/imagenes/cliente/");