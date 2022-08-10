
                    
                    <!-- Button trigger modal -->
              <!--       <div class="col-sm-12 text-center">
                    <div class="col text-center">
                      <button type="button" class="btn btn-primary" id="boton_proyecto" data-toggle="modal" data-target="#exampleModalCenter">
                      Nuevo Proyecto
                      </button>
                    </div>
                    </div> -->
                    

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form action="../../includes/process/insert/insertar_proyecto.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Agregar Usuario</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <label for="inputProyec">DNI</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="number" class="form-control" placeholder="Ingrese el Nro de DNI" id="dni" name="dni" required >
                          
                          
                        </div>
                        <label for="inputProyec">Nombres</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Nombre o Nombres" id="nombre" name="nombre" required >
                          
                          
                        </div>

                        <label for="inputProyec">Apellido Paterno</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Apellido Paterno" id="apellido_paterno" name="apellido_paterno" required >
                          
                          
                        </div>
                        <label for="inputProyec">Apellido Materno</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Apellido Materno" id="apellido_materno" name="apellido_materno" required >
                          
                          
                        </div>
                        <label for="inputProyec">Fecha de Nacimiento</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="date" class="form-control"  id="fecha_nacimiento" name="fecha_nacimiento" required >
                          
                          
                        </div>
                        <label for="inputProyec">Natural de </label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <!-- <label class="input-group-text" for="inputGroupSelect01">Extension</label> -->
                                <select class="form-control" name="id_extension" id="id_extension" required="">
                                            <option disabled="disabled" value="" selected>Clic para ver.</option>
                                            <?php 

                                            $sss=mysqli_query($con,"SELECT * FROM natural_usuario");
                                                    while($f=mysqli_fetch_assoc($sss)){    

                                                        echo '<option value="'.$f['id_natural'].'">'.$f['nombre_lugar'].'-'.$f['otro_natural'].'-'.$f['distrito_natural'].'</option>';

                                            }
                                            
                                            ?>
                                </select>
                               
                          
                          
                        </div>
                        <label for="inputProyec">Ocupacion</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Que ocupacion tiene" id="ocupacion" name="ocupacion" required >
                          
                          
                        </div>
                        <label for="inputProyec">Grado instruccion</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <select class="form-select" aria-label="Default select example">
                            <option selected>Clic para ver</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Superior">Superior</option>
                            <option value="Superior Tecnico">Superior Tecnico</option>
                            <option value="Analfabeto">Analfabeto</option>
                            <option value="Secundaria Incompleta">Secundaria Incompleta</option>
                            <option value="Primaria Incompleta">Primaria Incompleta</option>
                            <option value="Otro">Otro</option>
                        </select>
                          
                          
                        </div>
                        <label for="inputProyec">Estado Civil</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <select class="form-select" aria-label="Default select example">
                            <option selected>Clic para ver</option>
                            <option value="Casado/a">Casado/a</option>
                            <option value="Soltero/a">Soltero/a</option>
                            <option value="Viudo/a">Viudo/a</option>
                            <option value="Conviviente">Conviviente</option>
                            <option value="Divorciado/a">Divorciado/a</option>
                            <option value="Otro">Otro</option>
                        </select>
                          
                          
                        </div>
                        <label for="inputProyec">Esposo/a | Conviviente</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Esposo/a o Conviviente" id="esposa_conviviente" name="esposa_conviviente"  >
                          
                          
                        </div>
                        <label for="inputProyec">Sector</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Describa el sector" id="sector" name="sector" required >
                          
                          
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
                  
           