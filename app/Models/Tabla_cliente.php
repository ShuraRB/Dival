<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class Tabla_cliente extends Model {

        protected $table      = 'cliente';
        protected $primaryKey = 'id_cliente';
        protected $returnType = 'object';

        protected $allowedFields = [
                                    'id_cliente', 'nombre', 'ap_p', 'ap_m', 'telefono', 'correo',
                                     'empresa', 'fecha'
                                    ];
        
        //Funciones que nos ayudaran a realizar peticiones (consultas) para obtener la información que deseemos
        public function data_table_cliente($id_cliente = 0) {
            $resultado = $this
                    ->select('
                                id_cliente, nombre, ap_p, ap_m, telefono, correo,
                                empresa
                            ')
                    ->where('id_cliente >=',0)
                    ->orderBy('id_cliente', 'ASC')
                    ->findAll();
             return $resultado;
        }//end data_table_celulares

        public function obtener_cliente($id_cliente = 0){
            $resultado = $this
                        ->select('
                                    id_cliente, nombre, ap_p, ap_m, telefono, correo,
                                    empresa
                                ')
                        ->where('id_cliente', $id_cliente)
                        ->first();
            return $resultado;
        }//end obtener_cliente

        public function cliente_limit($limit) {
            $resultado = $this
                ->select('
                                    id_cliente, nombre, ap_p, ap_m, telefono, correo,
                                    empresa
                        ')
                ->orderBy('nombre', 'ASC')
                ->limit($limit)
                ->find();
            return $resultado;
        }// 

        public function cliente_actuales($fecha ='0000-00-00',$limit = 0) {
            $resultado = $this
                ->select('
                                    id_cliente, nombre, ap_p, ap_m, telefono, correo,
                                    empresa
                        ')
                ->orderBy('nombre', 'ASC')
                ->where('fecha',$fecha)
                ->limit($limit)
                ->find();
            return $resultado;
        }// 

        // public function oferta_calzados($id_categoria = 0, $limit = 0){
        //     $resultado = $this
        //                 ->select('
        //                             calzados.estatus_calzado, calzados.id_calzado, calzados.marca, calzados.modelo, calzados.color, calzados.talla,
        //                             calzados.genero, calzados.precio, calzados.imagen_calzado, calzados.destacado, calzados.fecha, ofertas.estatus_ofertas,
        //                             ofertas.id_oferta, ofertas.descuento, ofertas.fin_oferta
        //                         ')
        //                 ->where('calzados.genero', $id_categoria)
        //                 ->join('ofertas','calzados.id_calzado= ofertas.id_calzado', 'left')
        //                 ->limit($limit)
        //                 ->find();
        //     return $resultado;
        // }//end obtener_oferta_calzado

        // public function obtener_oferta_calzados($id_calzado = 0){
        //     $resultado = $this
        //                 ->select('
        //                             calzados.estatus_calzado, calzados.id_calzado, calzados.marca, calzados.modelo, calzados.color, calzados.talla,
        //                             calzados.genero, calzados.precio, calzados.imagen_calzado, calzados.destacado, calzados.fecha, 
        //                             calzados.descripcion, ofertas.estatus_ofertas,
        //                             ofertas.id_oferta, ofertas.descuento, ofertas.fin_oferta, ofertas.id_calzado
        //                         ')
        //                 ->where('calzados.id_calzado', $id_calzado)
        //                 ->join('ofertas','calzados.id_calzado= ofertas.id_calzado', 'left')
        //                 ->first();
        //     return $resultado;
        // }//end obtener_oferta_calzado
    }//End Model calzados
    



