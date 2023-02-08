
                    
                    <!-- Button trigger modal -->
              <!--       <div class="col-sm-12 text-center">
                    <div class="col text-center">
                      <button type="button" class="btn btn-primary" id="boton_proyecto" data-toggle="modal" data-target="#exampleModalCenter">
                      Nuevo Proyecto
                      </button>
                    </div>
                    </div> -->
                    

                  <!-- Modal -->
                  <div class="modal fade" id="ingresos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form action="../../includes/insertar/insertar_egreso.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Agregar Ingreso</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <?php 
                        $mes_actual =date("m");
                        $year_actual =date("Y");
                        date_default_timezone_set("America/Lima");
                        $hoy = date("Y-m-d H:i:s");     
                        ?>
                        <label for="inputProyec">Persona u Organizacion</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Datos de la Persona" id="beneficiario" name="beneficiario" required >
                          
                          
                        </div>

                       
                        <label for="inputProyec">Concepto</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Detalle de pago" id="concepto" name="concepto" required >
                          <input type="hidden" class="form-control" id="name_user" name="name_user"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $usuario;?>"  readonly>
                        <input type="hidden" class="form-control" id="id_user" name="id_user" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $id_usuario;?>"  readonly>
                        <input type="hidden" class="form-control" id="mes_actual" name="mes_actual" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $mes_actual;?>" readonly >
                       <!--  <span class="input-group-text" id="basic-addon1">Año</span> -->
                        <input type="hidden" class="form-control" id="year_actual" name="year_actual"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $year_actual;?>"  readonly>
                          
                        </div>
                
                      
                        <label for="inputProyec">Monto</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="number" class="form-control" placeholder="Cantidad a pagar" id="monto" name="monto" required >
                          
                          
                        </div>

                      <!--   mostrar el ultimo codigo de todos los proyectos -->
                      
                       
               


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                        
                        

                        
                        </form>
                    <!--     <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                        

                          </div>
                          
                          
                        </div>
 -->
                        
                       


                      </div>
                      
                    </div>
                  </div>
                  
           