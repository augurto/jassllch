<script >
                                      $(document).on("click", "#btnmodal",function () {
                                        
                                              var nombre =$(this).data('nom');
                                              var nombre_proyecto =$(this).data('nom2');
                                              var apellido =$(this).data('ape')
                                              var estado =$(this).data('estado');
                                              var dni =$(this).data('dni');

                                        $("#nombre").val(nombre);
                                        $("#nombre2").val(nombre_proyecto);

                                        $("#apellido").val(apellido);
                                        $("#estado").val(estado);
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
                    <form action="../../includes/process/actualizar/actualizar_proyecto.php">
                        <div class="modal-body">
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Cod Usuario</span>
                        <input type="text" class="form-control" id="nombre" name="codigo" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">DNI</span>
                        
                        <input type="text" class="form-control" id="dni" name="dni" aria-label="DNI" aria-describedby="basic-addon1" readonly >
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Mes</span>
                        <?php 
                        $mes_actual =strtotime(date("m"));
                        ?>
                        <input type="text" class="form-control" id="mes"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo '$mes_actual';?>" >
                       
                        </div>
                        <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Sub Tipo Proyecto</label>
                                <select class="form-control" name="id_entregable" id="sub2" required="">
                                            <option disabled="disabled" value="" selected>Clic para ver.</option>
                                            <?php 

                                            $sss=mysqli_query($con,"SELECT * FROM codigo_generado_proyecto");
                                                    while($f=mysqli_fetch_assoc($sss)){    

                                                        echo '<option value="'.$f['variable'].'">'.$f['variable'].'</option>';

                                            }
                                            
                                            ?>
                                </select>
                                        
                        </div>                  
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Presupuesto</span>
                        <input type="number" class="form-control" id="apellido" name="presupuesto" aria-label="Username" aria-describedby="basic-addon1">
                        
                        </div>

                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Actividad</span>
                        
                        <!-- 
                            <select class="form-select" aria-label="Default select example" name="estado" id="estado">
                            <option selected>Seleciona Estado</option>
                            <option value="0">Pendiente</option>
                            <option value="1" selected>Terminado</option>
                            <option value="2">Inactivo</option>
                            </select> -->
                            <select name="" class="">
                                <?php
                                    $mes=date("n"); 
                                    $rango=11; 
                                    for ($i=$mes;$i<=$mes+$rango;$i++){ 
                                        $mesano=date('Y-n', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                        $meses=date('F', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                        $ano=date('Y', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                        echo "<option value='$mesano'>$meses/$ano</option>"; 
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

