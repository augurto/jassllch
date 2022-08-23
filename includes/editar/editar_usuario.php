
<script >
                                      $(document).on("click", "#btnmodal0",function () {
                                        
                                              var idjass2 =$(this).data('idjass2');
                                              var nombres =$(this).data('nombres');
                                              var paterno =$(this).data('ape');
                                              var materno =$(this).data('ape_mat');
                                              var estado_civil =$(this).data('estado_civil');
                                              var jass_dni =$(this).data('jass_dni');
                                             

                                        $("#idjass2").val(idjass2);
                                        $("#nombres").val(nombres);

                                        
                                        $("#paterno").val(paterno);
                                        $("#materno").val(materno);
                                        $("#datos").val(nombres+" "+paterno+" "+materno);
                                        $("#estado_civil").val(estado_civil);
                                        $("#jass_dni").val(jass_dni);
                          
                                      })

                                    </script>

<!-- Modal -->
    <div class="modal fade" id="ModalEdit0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
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
                        <input type="hidden" class="form-control" id="idjass2" name="idjass2" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">DNI</span>
                        
                        <input type="text" class="form-control" id="jass_dni" name="jass_dni" aria-label="DNI" aria-describedby="basic-addon1"  >
                        </div>
                     
                        <?php 
                        $mes_actual =date("m");
                        $year_actual =date("Y");
                        date_default_timezone_set("America/Lima");
                        $hoy = date("Y-m-d H:i:s");     
                        ?>
                      
                      <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Nombres</label>
                                <input type="text" class="form-control" id="nombres" autofocus name="nombres" aria-label="nombres" aria-describedby="basic-addon1"   required >
                                        
                        </div> 
                        <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Apellido Paterno</label>
                                <input type="text" class="form-control" id="paterno" autofocus name="paterno" aria-label="DNI" aria-describedby="basic-addon1"   required >
                                        
                        </div>   
                        <div class="input-group mb-3">
                                
                                <label class="input-group-text" for="inputGroupSelect01">Apellido Materno</label>
                                <input type="text" class="form-control" id="materno" name="materno" aria-label="DNI" aria-describedby="basic-addon1"  >
                                        
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

