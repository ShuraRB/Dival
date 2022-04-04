<?php 
    namespace App\Controllers\Panel;
    use App\Controllers\BaseController;
    use App\Libraries\Permisos;

    class Herramienta_detalles extends BaseController{

        private $session;
        private $permitido = TRUE;

        public function __construct(){
            //cargar el permiso roles
            helper('permisos_roles_helper');
            //instancia de la sesion
            $session = session();
            //Verifica si el usuario logeado cuenta con los permiso de esta area
            if (acceso_usuario(TAREA_HERRAMIENTA_DETALLES)) {
                $session->tarea_actual = TAREA_HERRAMIENTA_DETALLES;
            }//end if 
            else{
                $this->permitido = FALSE;
            }//end else
        }//end constructor

        public function index($id_herramienta = NULL){
            //verifica si tiene permisos para continuar o no
            
            if($this->permitido){
                // dd($id_herramienta);
                $tabla_herramienta = new \App\Models\Tabla_herramienta;
                if($tabla_herramienta->find($id_herramienta) == null){
                    mensaje('No se encuentra el herramienta propocionado.', WARNING_ALERT);
                    return redirect()->to(route_to('acceso'));
                }//end if no existe el usuario
                else{
                   
                    return $this->crear_vista("Panel/herramienta_detalles", $this->cargar_datos($id_herramienta));
                }//end else no existe el usuario
            }//end if rol permitido
            else{
                mensaje("No tienes permiso para acceder a este módulo, contacte al administrador", WARNING_ALERT);
                return redirect()->to(route_to('herramienta'));
            }//end else rol no permitido
        }//end index

        private function cargar_datos($id_herramienta = NULL){
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
            //Cargamos el modelo correspondiente
            $tabla_herramienta = new \App\Models\Tabla_herramienta;
            $herramienta = $tabla_herramienta->obtener_herramienta($id_herramienta);

            //Datos propios por vista y controlador
            $datos['nombre_pagina'] = 'Detalles del herramienta: '.$herramienta->nombre;
            $datos['herramienta'] = $herramienta;
            // dd($datos['herramienta']);
            return $datos;
        }//end cargar_datos

        private function crear_vista($nombre_vista, $contenido = array()){
            $contenido['menu'] = crear_menu_panel(TAREA_HERRAMIENTA_DETALLES, '');
            return view($nombre_vista, $contenido);
        }//end crear_vista

        private function subir_archivo($file = NULL){
            $file_size = $file->getSize();
            $file_extension = $file->getherramientaxtension();
            $file_info = \Config\Services::image()
                                        ->withFile($file)
                                        ->getFile()
                                        ->getProperties(true);
            $file_name = (hash("sha256", fecha_actual())).'.'.$file_extension;
            if($file_size <= 2097152 &&
                ($file_extension == 'jpeg' || $file_extension == 'jpg' || $file_extension == 'png') &&
                $file_info['width'] <= 1200 && $file_info['height'] <= 1200){
                $file->move(IMG_DIR_herramienta, $file_name);
                return $file_name;
            }//end if la imagen cumple con los requisitos
            else{
                mensaje('Tu imagen no cumple con los requisitos solicitados.', DANGER_ALERT);
                return NULL;
            }//end else
        }//end subir_archivo

        private function eliminar_archivo ($file = NULL){
            
            if (!empty($file)) {
                if(file_exists(IMG_DIR_herramienta.'/'.$file)){
                    unlink(IMG_DIR_herramienta.'/'.$file);
                    return TRUE;
                }//end if
            }//end if is_null
            else{
                return FALSE;
            }//end else is_null
        }//end eliminar_archivo

        // -----------------------------------------------------
        // -----------------------------------------------------
        public function editar() {
            $id_herramienta = $this->request->getPost('id_herramienta');
            $herramienta_anterior = $this->request->getPost('herramienta_anterior');

            ///Cargamos el modelo correspondiente
            $tabla_herramienta = new \App\Models\Tabla_herramienta;

            //Declaración del arreglo 
            $herramienta = array();
            $herramienta['nombre'] = $this->request->getPost('nombre');
            $herramienta['cantidad'] = $this->request->getPost('cantidad');
            $herramienta['descripcion'] = $this->request->getPost('descripcion');
            $herramienta['proveedor'] = $this->request->getPost('proveedor');
            $herramienta['fecha'] = fecha_actual();
 

            if($tabla_herramienta->update($id_herramienta, $herramienta) > 0){
               
                // return redirect()->to(route_to('usuarios'));
                return redirect()->to(route_to('herramienta',$id_herramienta));
                mensaje("La información del herramienta ha sido actualizada exitosamente", SUCCESS_ALERT);
            }//end if se actualiza el usuario
            else{
                mensaje("Hubo un error al actualizar la información del herramienta. Intente nuevamente, por favor", DANGER_ALERT);
                return redirect()->to(route_to('herramienta',$id_herramienta));
            }//end else se inserta el usuario
            
        }//end editar

    }//End Class herramienta_detalles
