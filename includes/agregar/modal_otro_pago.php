
<script >
                                      $(document).on("click", "#btnmodal3",function () {
                                        
                                              var uno =$(this).data('uno');
                                              var dos =$(this).data('dos');
                                              var tres =$(this).data('tres');
                                              var materno2 =$(this).data('ape_mat2');
                                              var estado_civil2 =$(this).data('estado_civil2');
                                              var jass_dni2 =$(this).data('jass_dni2');
                                             

                                        $("#idjasss").val(idjasss);
                                        $("#nombres2").val(nombres2);

                                        
                                        $("#paterno2").val(paterno2);
                                        $("#materno2").val(materno2);
                                        $("#datos2").val(nombres+" "+paterno+" "+materno);
                                        $("#estado_civil2").val(estado_civil2);
                                        $("#jass_dni2").val(jass_dni2);
                          
                                      })

                                    </script>

<!-- Modal -->
    <div class="modal fade" id="ModalEdit3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Otros Pagos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    
                    <label for=""><?php
                        $var_PHP = "<script> document.write(estado) </script>"; // igualar el valor de la variable JavaScript a PHP 

                    echo $var_PHP   // muestra el resultado 

                    ?></label>
              

                    <form action="../../includes/process/update_usuario.php" name="calculadora">
                        <div class="modal-body">
                        <div class="input-group mb-3">
                       <!--  <span class="input-group-text" id="basic-addon1">Cod Usuario</span> -->
                        <input type="hidden" class="form-control" id="idjasss" name="idjasss" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">DNI</span>
                        
                        <input type="text" class="form-control" id="uno" name="uno" aria-label="DNI" aria-describedby="basic-addon1"  >
                        </div>
                     
                        <?php 
                        $mes_actual =date("m");
                        $year_actual =date("Y");
                        date_default_timezone_set("America/Lima");
                        $hoy = date("Y-m-d H:i:s");     
                        ?>
                      
                      <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Nombres</label>
                                <input type="text" class="form-control" id="dos" autofocus name="dos" aria-label="nombres" aria-describedby="basic-addon1"   required >
                                        
                        </div> 
                        <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Apellido Paterno</label>
                                <input type="text" class="form-control" id="tres" autofocus name="tres" aria-label="DNI" aria-describedby="basic-addon1"   required >
                                        
                        </div>   
                        <div class="input-group mb-3">
                                
                                <label class="input-group-text" for="inputGroupSelect01">Apellido Materno</label>
                                <input type="text" class="form-control" id="materno" name="materno2" aria-label="DNI" aria-describedby="basic-addon1"  >
                                        
                        </div>  
                        <!-- <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Estado Civil</span>
                        
                        <select class="form-select" aria-label="Default select example" name="estado_civil" id="estado_civil">
                            <option selected>Clic para ver</option>
                            <option value="Casado/a">Casado/a</option>
                            <option value="Soltero/a">Soltero/a</option>
                            <option value="Viudo/a">Viudo/a</option>
                            <option value="Conviviente">Conviviente</option>
                            <option value="Divorciado/a">Divorciado/a</option>
                            <option value="Otro">Otro</option>
                        </select>
                        </div>   -->
                        <div class="input-group mb-3">
                       <!--  <span class="input-group-text" id="basic-addon1">Hoy</span> -->
                        <input type="hidden" class="form-control" id="hoy" name="hoy"  aria-label="hoy" aria-describedby="basic-addon1" value="<?php echo $hoy;?>"  readonly >
                                               
                        </div>
                        <div class="input-group mb-3">
                        
                        
                       <!--  <span class="input-group-text" id="basic-addon1">Mes</span> -->
                        
                        <input type="hidden" class="form-control" id="mes_actual" name="mes_actual" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $mes_actual;?>" readonly >
                       <!--  <span class="input-group-text" id="basic-addon1">Año</span> -->
                        <input type="hidden" class="form-control" id="year_actual" name="year_actual"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $year_actual;?>"  readonly>
                        
                        </div>
                        <div class="input-group mb-3">
                      <!--   <span class="input-group-text" id="basic-addon1">Usuario</span> -->
                        <input type="hidden" class="form-control" id="name_user" name="name_user"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $usuario;?>"  readonly>
                        <input type="hidden" class="form-control" id="id_user" name="id_user" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $id_usuario;?>"  readonly>
                       
                       
                        </div>
                                    
                        

                        
                                          
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>

