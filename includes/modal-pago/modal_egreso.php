
                    
                    <!-- Button trigger modal -->
              <!--       <div class="col-sm-12 text-center">
                    <div class="col text-center">
                      <button type="button" class="btn btn-primary" id="boton_proyecto" data-toggle="modal" data-target="#exampleModalCenter">
                      Nuevo Proyecto
                      </button>
                    </div>
                    </div> -->
                    

                  <!-- Modal -->
                  <div class="modal fade" id="egreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form action="../../includes/insertar/insetar_usuario.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Agregar Egreso</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        
                        <label for="inputProyec">Beneficiario</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Nombre o Nombres" id="nombre" name="nombre" required >
                          
                          
                        </div>

                        
                        <label for="inputProyec">Fecha de egreso</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="date" class="form-control"  id="fecha_nacimiento" name="fecha_nacimiento" required >
                          
                          
                        </div>
                        <label for="inputProyec">Concepto</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Direccion de domicilio" id="direccion_actual" name="direccion_actual" required >
                          
                          
                        </div>
                
                      
                        <label for="inputProyec">Monto</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="number" class="form-control" placeholder="Cantidad de miembros" id="c_miembros" name="c_miembros" required >
                          
                          
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
                  
           