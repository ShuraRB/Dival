<?php 
    namespace App\Controllers\Panel;
    use App\Controllers\BaseController;
    use App\Libraries\Permisos;

    class Nuevo_material extends BaseController{

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
            if($this->permitido){
                return $this->crear_vista("panel/nuevo_material", $this->cargar_datos());
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
                        : (($session->sexo_usuario == SEXO_FEMENINO) ? base_url(RECURSOS_CONTENIDO.'imagenes/usuarios/female.png') : base_url(RECURSOS_CONTENIDO.'imagenes/usuarios/male.png'));
            
                        //Cargamos el modelo correspondiente
            $datos['nombre_pagina'] = 'Nuevo material';
            return $datos;
        }//end cargar_datos

        private function crear_vista($nombre_vista, $contenido = array()){
            $contenido['menu'] = crear_menu_panel(TAREA_MATERIAL, '');
            return view($nombre_vista, $contenido);
        }//end crear_vista


        private function subir_archivo($file = NULL){
            $file_size = $file->getSize();
            $file_extension = $file->getmaterialExtension();
            $file_info = \Config\Services::image()
                                        ->withFile($file)
                                        ->getFile()
                                        ->getProperties(true);
            $file_name = (hash("sha256", fecha_actual())).'.'.$file_extension;
            if($file_size <= 2097152 &&
                ($file_extension == 'jpeg' || $file_extension == 'jpg' || $file_extension == 'png') &&
                $file_info['width'] <= 512 && $file_info['height'] <= 512){
                $file->move(IMG_DIR_MATERIAL, $file_name);
                return $file_name;
            }//end if la imagen cumple con los requisitos
            else{
                mensaje('Tu imagen no cumple con los requisitos solicitados.', DANGER_ALERT);
                return NULL;
            }//end else
        }//end subir_archivo

        // -----------------------------------------------------
        // -----------------------------------------------------
        public function registrar() {
            
            //Cargamos el modelo correspondiente
            $tabla_material = new \App\Models\Tabla_material;

            //Declaración del arreglo 
            $material = array();
            $material['nombre'] = $this->request->getPost('nombre');
            $material['cantidad'] = $this->request->getPost('cantidad');
            $material['descripcion'] = $this->request->getPost('descripcion');
            $material['proveedor'] = $this->request->getPost('proveedor');
            $material['fecha'] = fecha_actual();
 
            // $usuario['imagen_calzado'] = $this->request->getPost('');
            // dd($calzado);

            //verificar si tiene algo el input de file
            // if(!empty($this->request->getFile('image_calzado')) && $this->request->getFile('image_calzado')->getSize() > 0){
                // $calzado['imagen_calzado'] = $this->subir_archivo($this->request->getFile('image_calzado'));
                if($tabla_material->insert($material) > 0){
                    mensaje("El material ha sido registrado exitosamente", SUCCESS_ALERT);
                    return redirect()->to(route_to('material'));
                }//end if se inserta el usuario
                else{
                    mensaje("Hubo un error al registrar el material. Intente nuevamente, por favor", DANGER_ALERT);
                    return $this->index();
                }//end else se inserta el usuario
			// }//end if existe imagen
            // else{
            //     mensaje("Hubo error al subir la imagen. Intente nuevamente, por favor", DANGER_ALERT);
            //     return $this->index();
            // }//end else 


        }//end registrar
    }//End Class Dashboard
