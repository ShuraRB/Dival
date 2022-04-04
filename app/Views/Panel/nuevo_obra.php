<?= $this->extend("plantillas/panel_base") ?>
<!-- CSS -->
<?= $this->section("css") ?>
    <!-- BostrapValidator css -->
    <link rel="stylesheet" href="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'css/boostrapvalidator.min.css');?>">

    <!-- Show the validation -->
    <style>
        .has-error .help-block{
            line-height: 45px;
            color: red;
        } 
        .has-error input{
            border-color: red !important;
        }
        .has-success input{
            border-color: green !important;
        }
        .has-error select{
            border-color: red !important;
        }
        .has-success select{
            border-color: green !important;
        }
        .has-error textarea{
            border-color: red !important;
        }
        .has-success textarea{
            border-color: green !important;
        }
    </style>
<?= $this->endSection(); ?>
<!-- End  -->

<!-- CONTENIDO -->
<?= $this->section("contenido") ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Registrar nueva obra</h5>
                    <h6>Todos los campos marcados con (<font color="red">*</font>) son obligatorios</h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('registrar_rg',['id' => 'form-user-register','class' => 'user']); ?>

                    <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Nombre(s) (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'nombre',
                                            'name' => 'nombre',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Nombre(s)',
                                            'value' => set_value('nombre')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Supervisor (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'supervisor',
                                            'name' => 'supervisor',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Supervisor',
                                            'value' => set_value('supervisor')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Descripción (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'descripcion',
                                            'name' => 'descripcion',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Descripción',
                                            'value' => set_value('descripcion')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Presupuesto (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'number',
                                            'id' => 'presupuesto',
                                            'name' => 'presupuesto',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Presupuesto',
                                            'min' => '1',
                                            'step' => '0.01',
                                            'value' => set_value('presupuesto')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Costo Real (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'number',
                                            'id' => 'costo_real',
                                            'name' => 'costo_real',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Costo_real',
                                            'min' => '1',
                                            'step' => '0.01',
                                            'value' => set_value('costo real')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">ID Cliente(<font color="red">*</font>):</label><br>
                                    <?php
                                        $input = array(
                                            'type' => 'number',
                                            'id' => 'id_cliente',
                                            'name' => 'id_cliente',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'id_cliente',
                                            'value' => set_value('id_cliente')
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>                      
                                



                        <div class="text-center">
                            <a class="btn btn-danger" id="bnt-cancelar" href="<?= route_to('obra'); ?>"><i class="fa fa-times"></i> Cancelar</a>
                            <?php
                                $btn_submit = array(
                                                    'name'    => 'btn_submit',
                                                    'id'      => 'btn-submit',
                                                    'value'   => 'true',
                                                    'type'    => 'submit',
                                                    'class' => 'btn btn-success',
                                                    'content' => '<i class="fa fa-lg fa-save"></i> Registrar',
                                                );
                                echo form_button($btn_submit);
                            ?>
                        </div>

                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
<!-- End  -->

<!-- JS -->
<?= $this->section("js") ?>
    <!-- Js boostrap Validation -->
    <script type="text/javascript" src="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'js/bostrap-validator.min.js')?>"></script>
    <!--  -->
    <script type="text/javascript">
        document.getElementById("imagen-rg").onchange = function(e) {
            // Se crea un objeto FileReader
            let reader = new FileReader();
            // Se leé el archivo seleccionado y se pasa como argumento al objeto FileReader
            reader.readAsDataURL(e.target.files[0]);
            // Se visualiza la imagen una vez que fue cargada en el objeto FileReader
            reader.onload = function(){
                let imgPreview = document.getElementById('img-preview');
                imgPreview.src = reader.result;
            };
        }
    </script>
    <!-- Form validation -->
    <script>
        $(document).ready(function () {
            $('#form-user-register').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nombre: {
                        validators: {
                            notEmpty: {
                                message: 'Nombre es requerido'
                            },
                        }//validacion
                    },//end nombre
                    supervisor: {
                        validators: {
                            notEmpty: {
                                message: 'El supervisor es requerido'
                            },
                        }//validacion
                    },//end apellido_paterno
                    descripcion: {
                        validators: {
                            notEmpty: {
                                message: 'Se requiere la descripción'
                            },
                        }//validacion
                    },//end apellido_materno
                    presupuesto: {
                        validators: {
                            notEmpty: {
                                message: 'El presupuesto es requerido'
                            },
                        }//validacion
                    },//end sexo
                    costo_real: {
                        validators: {
                            notEmpty: {
                                message: 'El costo real es requerido'
                            },
                        }//validacion
                    },//end costo real
                    id_cliente: {
                        validators: {
                            notEmpty: {
                                message: 'El ID cliente es requerido'
                            },
                        }//validacion
                    },//end sexo
                }//end fields
            });
        });
    </script>
<?= $this->endSection(); ?>
<!-- End  -->