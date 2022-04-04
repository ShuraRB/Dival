<?php 
    namespace App\Controllers\Panel;
    use App\Controllers\BaseController;
    use App\Libraries\Permisos;

    class Material extends BaseController{

        private $session;
        private $permitido = TRUE;

        public function __construct(){
            //cargar el permiso roles
            helper('permisos_roles_helper');
            //instancia de la sesion
            $session = session();
            //Verifica si el usuario logeado cuenta con los permiso de esta area
            if (acceso_usuario(TAREA_MATERIAL)) {
                $session->tarea_actual = TAREA_MATERIAL;
            }//end if 
            else{
                $this->permitido = FALSE;
            }//end else
            
        }//end constructor

        public function index(){
            //verifica si tiene permisos para continuar o no
            // dd($this->permitido);
            if($this->permitido){
                // dd($this->permitido);
                return $this->crear_vista("panel/material", $this->cargar_datos());
            }//end if rol permitido
            else{
                mensaje("No tienes permiso para acceder a este módulo, contacte al administrador", WARNING_ALERT);
                return redirect()->to(route_to('acceso'));
            }//end else rol no permitido
        }//end index

        private function cargar_datos(){
            //======================================================================
            //==========================DATOS FUNDAMENTALES=========================
            //======================================================================
            //Declaración del arreglo
            $datos = array();
            //Instancia de la variable de sesión
            $session = session();

            //Datos fundamentales para la plantilla base
            $datos['nombre_completo_usuario'] = $session->usuario_completo;
            $datos['nombre_usuario'] = $session->nombre_usuario;
            $datos['email_usuario'] = $session->email_usuario;
            $datos['imagen_usuario'] = ($session->imagen_usuario != NULL) 
                                            ? base_url(RECURSOS_CONTENIDO.'imagenes/usuarios/'.$session->imagen_usuario) 
                                            : (($session->sexo_usuario == SEXO_FEMENINO) ? base_url(RECURSOS_CONTENIDO.'imagenes/usuarios/female.png') : base_url(RECURSOS_CONTENIDO.'imagenes/usuarios/male.jpg'));
            
            //Datos propios por vista y controlador
            $datos['nombre_pagina'] = 'Material';

            //Cargamos el modelo correspondiente
            $tabla_material = new \App\Models\Tabla_material;
            $datos['material'] = $tabla_material->data_table_material($session->id_material);

            return $datos;
        }//end cargar_datos

        private function crear_vista($nombre_vista, $contenido = array()){
            $contenido['menu'] = crear_menu_panel(TAREA_MATERIAL, '');
            return view($nombre_vista, $contenido);
        }//end crear_vista

        private function eliminar_archivo ($file = NULL){
            if (!empty($file)) {
                if(file_exists(IMG_DIR_MATERIAL.'/'.$file)){
                    unlink(IMG_DIR_MATERIAL.'/'.$file);
                    return TRUE;
                }//end if
            }//end if is_null
            else{
                return FALSE;
            }//end else is_null
        }//end eliminar_archivo

        public function eliminar($id_material = 0) {
            //Cargamos el modelo correspondiente
            $tabla_material = new \App\Models\Tabla_material;
            //Query
            $material = $tabla_material->obtener_material($id_material); 
            if (!empty($material)) {
                //Se va a eliminar el usuario
                if($tabla_material->delete($id_material)) {
                    mensaje("El material ha sido eliminado exitosamente", SUCCESS_ALERT);
                }//end if eliminar
                else {
                    mensaje("Hubo un error al eliminar a este material, intenta nuevamente", DANGER_ALERT);
                }//end else

            }//end if count
            else {
                mensaje("El material que deseas eliminar no existe", WARNING_ALERT);
            }//end else count
            //redirecciona al modulo de usuarios
            return redirect()->to(route_to('material'));
        }//end eliminar
    }//End Class Catalogo_samsung
