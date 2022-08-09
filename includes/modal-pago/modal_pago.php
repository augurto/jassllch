<script >
                                      $(document).on("click", "#btnmodal",function () {
                                        
                                              var jass =$(this).data('jass');
                                              var nombre =$(this).data('nombre');
                                              var paterno =$(this).data('paterno')
                                              var materno =$(this).data('materno');
                                              var dni =$(this).data('dni');

                                        $("#jass").val(jass);
                                        $("#nombre").val(nombre);

                                        
                                        $("#paterno").val(paterno);
                                        $("#materno").val(materno);
                                        $("#datos").val(nombre+" "+paterno+" "+materno);
                                        $("#dni").val(dni);
                          
                                      })

                                    </script>

<!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pago</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    
                    <label for=""><?php
                        $var_PHP = "<script> document.write(estado) </script>"; // igualar el valor de la variable JavaScript a PHP 

                    echo $var_PHP   // muestra el resultado 

                    ?></label>
                    <script>
                        //Función que realiza la suma
                        function Suma() {
                        var monto_pago = document.calculadora.monto_pago.value;
                        var deuda = document.calculadora.deuda.value;
                        try{
                            //Calculamos el número escrito:
                            monto_pago = (isNaN(parseFloat(monto_pago)))? 0 : parseFloat(monto_pago);
                            deuda = (isNaN(parseFloat(deuda)))? 0 : parseFloat(deuda);
                            document.calculadora.vuelto.value = monto_pago-deuda;
                        }
                        //Si se produce un error no hacemos nada
                        catch(e) {}
                        }
                        </script>

                    <form action="../../includes/process/nuevo_pago.php" name="calculadora">
                        <div class="modal-body">
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Cod Usuario</span>
                        <input type="text" class="form-control" id="jass" name="jass" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">DNI</span>
                        
                        <input type="text" class="form-control" id="dni" name="dni" aria-label="DNI" aria-describedby="basic-addon1" readonly >
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Datos</span>
                        <input type="text" class="form-control" id="datos" name="datos" aria-label="Username" aria-describedby="basic-addon1"  readonly>
                        
                        <?php 
                        $mes_actual =date("m");
                        $year_actual =date("y");
                        date_default_timezone_set("America/Lima");
                        $hoy = date("Y-m-d H:i:s");     
                        ?>
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Hoy</span>
                        <input type="text" class="form-control" id="hoy" name="hoy"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $hoy;?>"  readonly >
                                               
                        </div>
                        <div class="input-group mb-3">
                        
                        
                        <span class="input-group-text" id="basic-addon1">Mes</span>
                        
                        <input type="text" class="form-control" id="mes_actual"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $mes_actual;?>" readonly >
                        <span class="input-group-text" id="basic-addon1">Año</span>
                        <input type="text" class="form-control" id="year_actual" name="year_actual"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $year_actual;?>"  readonly>
                        
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Usuario</span>
                        <input type="text" class="form-control" id="name_user" name="name_user"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $usuario;?>"  readonly>
                        <input type="text" class="form-control" id="id_user" name="id_user" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $id_usuario;?>"  readonly>
                       
                       
                        </div>
                        <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Con cuanto paga</label>
                                <input type="text" class="form-control" id="monto_pago" name="monto_pago" aria-label="DNI" aria-describedby="basic-addon1" name="ingreso1" onKeyUp="Suma()" required >
                                        
                        </div>   
                        <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Monto a Pagar</label>
                                <input type="text" class="form-control" id="deuda" name="deuda"  aria-label="DNI" aria-describedby="basic-addon1"  name="ingreso2" onKeyUp="Suma()" required>
                                <label class="input-group-text" for="inputGroupSelect01">Vuelto</label>
                                <input type="text" class="form-control" id="vuelto" name="vuelto" aria-label="DNI" aria-describedby="basic-addon1" readonly >
                                        
                        </div>                  
                        

                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Pago del Mes</span>
                        
                        <!-- 
                            <select class="form-select" aria-label="Default select example" name="estado" id="estado">
                            <option selected>Seleciona Estado</option>
                            <option value="0">Pendiente</option>
                            <option value="1" selected>Terminado</option>
                            <option value="2">Inactivo</option>
                            </select> -->
                            <select name="mes_pago" id="mes_pago" class="form-select" required>
                                <?php
                                    $mes=date("n"); 
                                    $rango=11; 
                                    for ($i=$mes;$i<=$mes+$rango;$i++){ 
                                        $mesano=date('Y-n', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                        $meses=date('F', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                        if ($meses=="January") $meses="Enero";
                                        if ($meses=="February") $meses="Febrero";
                                        if ($meses=="March") $meses="Marzo";
                                        if ($meses=="April") $meses="Abril";
                                        if ($meses=="May") $meses="Mayo";
                                        if ($meses=="June") $meses="Junio";
                                        if ($meses=="July") $meses="Julio";
                                        if ($meses=="August") $meses="Agosto";
                                        if ($meses=="September") $meses="Septiembre";
                                        if ($meses=="October") $meses="Octubre";
                                        if ($meses=="November") $meses="Noviembre";
                                        if ($meses=="December") $meses="Diciembre";
                                        $ano=date('Y', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                        echo "<option value='$meses'>$meses</option>"; 
                                    } 
                                ?> 
                                </select>
                        </div>
                                          
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Pagar</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>

