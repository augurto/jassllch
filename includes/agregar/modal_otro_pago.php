<script >
                                      $(document).on("click", "#btnmodall",function () {
                                        
                                              var unno =$(this).data('unno');
                                              var dnijass3 =$(this).data('dnijass3');
                                              var dos =$(this).data('dos')
                                              var tres =$(this).data('tres');
                                              var cuatro =$(this).data('cuatro');
                                             

                                        $("#unno").val(unno);
                                        $("#dnijass3").val(dnijass3);

                                        
                                        $("#dos").val(dos);
                                        $("#tres").val(tres);
                                        $("#cuatro").val(cuatro);
                                        $("#datos_completos").val(dos+" "+tres+" "+cuatro);
                                       
                          
                                      })

                                    </script>

<!-- Modal -->
    <div class="modal fade" id="ModalEditt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    <form action="../../includes/insertar/insertar_otros_pagos.php" name="calculadora">
                        <div class="modal-body">
                        <div class="input-group mb-3">
                       <!--  <span class="input-group-text" id="basic-addon1">Cod Usuario</span> -->
                        <input type="hidden" class="form-control" id="idjass" name="idjass" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Codigo</span>
                        
                        <input type="text" class="form-control" id="unno" name="unno" aria-label="DNI" aria-describedby="basic-addon1" readonly >
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Usuario</span>
                        
                        <input type="text" class="form-control" id="datos_completos" name="datos_completos" aria-label="DNI" aria-describedby="basic-addon1" readonly >
                        </div>
                        
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">DNI</span>
                        <input type="text" class="form-control" id="dnijass3" name="dnijass3" aria-label="Username" aria-describedby="basic-addon1"  readonly>
                        
                        <?php 
                        $mes_actual =date("m");
                        $year_actual =date("Y");
                        date_default_timezone_set("America/Lima");
                        $hoy = date("Y-m-d H:i:s");     
                        ?>
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Concepto</span>
                        
                            <select class="form-select" aria-label="Default select example" name="estado" id="estado">
                            <option selected>Seleciona Concepto</option>
                            <option value="Multa">Multa</option>
                            <option value="Padron">Padron</option>
                            <option value="Cuota Familiar">Cuota Familiar</option>
                            <option value="Conexion de Agua" selected>Conexion de Agua</option>
                            <option value="Conexion de Desague">Conexion de Desague</option>
                            </select>
                        
                     
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Monto</span>
                        
                        <input type="number" class="form-control" id="monto" name="monto" aria-label="DNI" aria-describedby="basic-addon1"  >
                        </div>
                       <!--  <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Mes</span>
                        
                         
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
                        </div>   -->
                        <div class="input-group mb-3">
                       <!--  <span class="input-group-text" id="basic-addon1">Hoy</span> -->
                        <input type="hidden" class="form-control" id="hoy" name="hoy"  aria-label="hoy" aria-describedby="basic-addon1" value="<?php echo $hoy;?>"  readonly >
                                               
                        </div>
                        <div class="input-group mb-3">
                        
                        
                       <!--  <span class="input-group-text" id="basic-addon1">Mes</span> -->
                        
                        <input type="hidden" class="form-control" id="mes_actual" name="mes_actual" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $mes_actual;?>" readonly >
                        <span class="input-group-text" id="basic-addon1">Año</span>
                        <input type="number" class="form-control" id="year_actual" name="year_actual"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $year_actual;?>"  >
                        
                        </div>
                        <div class="input-group mb-3">
                      <!--   <span class="input-group-text" id="basic-addon1">Usuario</span> -->
                        <input type="hidden" class="form-control" id="name_user" name="name_user"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $usuario;?>"  readonly>
                        <input type="hidden" class="form-control" id="id_user" name="id_user" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $id_usuario;?>"  readonly>
                       
                       
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

