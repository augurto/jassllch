
                    
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
                          <h5 class="modal-title" id="exampleModalLongTitle">Agregar Proyecto</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <label for="inputProyec">Nombre del Proyecto</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-archive" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Nombre del Proyecto" id="nombre-proyecto" name="nombre-proyecto" >
                          
                          
                        </div>

                      <!--   mostrar el ultimo codigo de todos los proyectos -->
                      
                       

                      <label for="inputProyec">Codigo del Proyecto</label>
                        <div class="input-group">

                                <!-- <select class="form-control" id="extension" name="extension" required>
                                  <option value="0">--Ext. del codigo--</option>
                                      <?php
                                        $programas=mysqli_query($con,"select * from codigo_generado_proyecto");
                                        while ($rw=mysqli_fetch_array($programas)){
                                          $id=$rw["id_cod_gen_pro "];
                                          $grupo=$rw["variable"];
                                          
                                      ?>
                                  <option value="<?php echo $id;?>"><?php echo $grupo;?></option>
                                  <?php
                                        }
                                  ?>
                                </select> -->
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="fa fa-qrcode"></span></span>
                            </div>
                   

                              <?php $rs = mysqli_query($con, "SELECT MAX(id) AS id FROM proyecto");
                              if ($row = mysqli_fetch_row($rs)) {
                              $codigo_proyecto = trim($row[0]);
                              $id_codigo=++$codigo_proyecto;
                              } 
                              
                              ?>

                             <input type="number" class="form-control" id="codigo"  name="codigo"  value="<?php echo $id_codigo ?>" readonly>
                             
                       </div>
                       <br>
                       <label for="inputProyec">Sub tipo del Proyecto</label>
                       <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Extension</label>
                                <select class="form-control" name="id_extension" id="id_extension" required="">
                                            <option disabled="disabled" value="" selected>Clic para ver.</option>
                                            <?php 

                                            $sss=mysqli_query($con,"SELECT * FROM codigo_generado_proyecto");
                                                    while($f=mysqli_fetch_assoc($sss)){    

                                                        echo '<option value="'.$f['variable'].'">'.$f['variable'].'</option>';

                                            }
                                            
                                            ?>
                                </select>
                                        
                        </div>
                       <label for="inputProyec">Presupuesto</label>
                       
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-usd" aria-hidden="true">S/.</i></span>
                          </div>
                          <input type="number" class="form-control" placeholder="Presupuesto" id="presupuesto" name="presupuesto" >
                          
                        </div>

                              <!-- para insertar adelanto -->

                        <!-- <br>
                       <label for="inputProyec">Adelanto</label>
                       
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-usd" aria-hidden="true">S/.</i></span>
                          </div>
                          <input type="number" class="form-control" placeholder="Platita" >
                          
                        </div> -->
                              <br>
                            <label>Cronograma</label>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="fas fa-calendar"></span></span>
                            </div>
                            <input type="date" class="form-control" name="fecha_ini" id="fecha_ini" title="Fecha inicio"  value="<?php echo date('d-m-Y'); ?>" required>
                          </div>
                          <!-- /input-group -->
                        </div>
                        <br>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="fas fa-calendar"></span></span>
                            </div>
                            <input type="date" class="form-control" name="fecha_fin"  id="fecha_fin"  title="Fecha fin" required>
                            <input type="hidden" value="Ego" class="form-control" name="usuario"  id="usuario"  title="usuario" required>
                          </div>
                          <!-- /input-group -->
                        </div>
                          <br>
                        <!-- /.col-lg-6 -->
                      </div>
                                              


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
                  
           