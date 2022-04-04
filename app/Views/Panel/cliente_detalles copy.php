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
                    <h5 class="m-0 font-weight-bold text-primary">Editar cliente</h5>
                    <h6>Todos los campos marcados con (<font color="red">*</font>) son obligatorios</h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('editar_cliente',['id' => 'form-user-register','class' => 'user']); ?>
                       

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Nombre(<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'nombre',
                                            'name' => 'nombre',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Nombre del cliente',
                                            'value' => $cliente->nombre
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Apellido Paterno (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'ap_p',
                                            'name' => 'ap_p',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Apellido Paterno',
                                            'value' => $cliente->ap_p
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Apellido Materno (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'ap_m',
                                            'name' => 'ap_m',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Apellido materno',
                                            'value' => $cliente->ap_m
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Telefono (<font color="red">*</font>):</label><br>
                                    <?php
                                        $input = array(
                                            'type' => 'number',
                                            'id' => 'telefono',
                                            'name' => 'telefono',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Numero telefonico',
                                            'value' => $cliente->telefono
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Correo (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'correo',
                                            'name' => 'correo',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Correo electronico',
                                            'value' => $cliente->correo
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Empresa (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'empresa',
                                            'name' => 'empresa',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Nombre de la empresa',
                                            'value' => $cliente->empresa
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>


                        <div class="text-center">
                            <a class="btn btn-danger" id="bnt-cancelar" href="<?= route_to('cliente'); ?>"><i class="fa fa-times"></i> Cancelar</a>
                            <?php
                                $btn_submit = array(
                                                    'name'    => 'btn_submit',
                                                    'id'      => 'btn-submit',
                                                    'value'   => 'true',
                                                    'type'    => 'submit',
                                                    'class' => 'btn btn-success',
                                                    'content' => '<i class="fa fa-lg fa-save"></i> Editar',
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
        document.getElementById("imagen-celular").onchange = function(e) {
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
                                message: 'El nombre del cliente es requerido'
                            },
                        }//validacion
                    },//end 
                    ap_p: {
                        validators: {
                            notEmpty: {
                                message: 'El Apellido Paterno es requerido'
                            },
                        }//validacion
                    },//end 
                    ap_m: {
                        validators: {
                            notEmpty: {
                                message: 'El Apellido Materno es requerido'
                            },
                        }//validacion
                    },//end 
                    telefono: {
                        validators: {
                            notEmpty: {
                                message: 'El telefono del cliente es requerido'
                            },
                        }//validacion
                    },//end 
                    correo: {
                        validators: {
                            notEmpty: {
                                message: 'El correo es requerido'
                            },
                        }//validacion
                    },//end 
                    empresa: {
                        validators: {
                            notEmpty: {
                                message: 'La empresa de origen es requerida'
                            },
                        }//validacion
                    },//end 
                }//end fields
            });
        });
    </script>
<?= $this->endSection(); ?>
<!-- End  -->