
        <!--Ejemplo tabla con DataTables-->
        <?php require_once ('./config/conexion_tabla.php') ?>
        <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-hover" cellspacing="0" width="100%">
                        
                        <thead>
                                <tr>
                                    <th>Id</th>
                                    
                                    <th>Proyecto</th>
                                    
                                    <th>Presupuesto</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Estado</th>
                                    <?php if ($tipo_user==1) {?>
                                        <th>Accion</th>
                                        <?php }?>
                                    
                                    
                                </tr>
                                </thead>
                        <?php 
                        $count=1;
                        foreach ($link->query('SELECT * from usuarios_jass') as $row){ // aca se hace la consulta e iterarla con each. ?> 
                        <?php
                        
                        $id=$row['id_jass'];
                        $codigo=$row['nombres'];
                        $extencion=$row['ap_paterno'];
                        
                        $nombre_proyecto=$row['ap_materno'];
                        $presupuesto=$row['presupuesto'];
                        $usuario2=$row['usuario_maker'];
                        $fecha_ini=$row['fecha_ini'];
                        $fecha_fin=$row['fecha_fin'];
                        $fecha_actual=strtotime(date("Y-m-d",time()));
                        $fecha2=strtotime($fecha_fin);   
                        $estado=$row['estado'];
                         if ($fecha_actual>$fecha2) { ?>
                             
                             <tr style="background-color: red !important;">

                             <?php  } else{?>
                             <tr style="background-color: blue !important;">
                             <?php }?>   
                             <td><?php echo $count++; ?></td>
                             
                             <td><a href="../../entregables.php?id_p=<?php echo $id; ?>&user=<?php echo $usuario ?>"><?php echo $codigo.'-'.$extencion.'-'.$nombre_proyecto; ?></a></td>
                             
                             
                             <td><span id="firstname<?php echo $presupuesto; ?>"><?php echo $presupuesto; ?></span></td>
                             <td><span id="lastname<?php echo $fecha_ini; ?>"><?php echo $fecha_ini; ?></span></td>
                             <td><span id="address<?php echo $fecha_fin; ?>"><?php echo $fecha_fin; ?></span></td>
                             <!-- <td><?php echo $fecha_ini ?></td>
                             <td><?php echo $fecha_fin ?></td> -->
                            <td><?php if ($estado==0) {
                                # code...
                                echo 'Pendiente';
                            } elseif ($estado==1) {
                                # code...
                                echo 'Terminado';
                            } elseif ($estado==2) {
                                # code...
                                echo 'Inactivo';
                            }?></td>
                            <?php if ($tipo_user==1) { ?>
                              
                            <td>
                                <div class="row">
                                <div class="col-sm-12 text-center">
                                <form action="../../operaciones.php?cod_operacion=<?php echo $codigo ;?>" method="get">
                                    <button type="button" id="btnmodal" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit" data-nom="<?php echo $codigo; ?>" data-nom2="<?php echo $nombre_proyecto; ?>" data-ape="<?php echo $presupuesto;?>" data-estado="<?php echo $estado;  ?>" data-sub2="<?php echo $extencion;  ?>" >
                                    <i class="fa fa-edit"></i>
                                    </button>
                                    <input type="hidden" value="<?php echo $codigo ;?>" id="codigo_operacion" name="codigo_operacion">
                                        <button type="submit" class="btn btn-outline-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                                            <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                            </svg>
                                            
                                        </button>
                                </form>
                                </div>
                                </div>
                                    <!-- <button type="button" id="btnmodal" class="btn btn-danger" data-toggle="modal" data-target="#ModalBorrar" data-cod="<?php echo $codigo; ?>" data-ape="<?php echo $nombre_proyecto; ?>">
                                    <i class="fa fa-trash"></i>
                                    </button> -->

                                    
                                   

                            </td>
                            <?php }
                            ?>
                            
                              <!-- <a href="../../includes/process/eliminar/eliminar_proyecto.php?id_p=<?php echo $id_proyecto; ?>" class="btn btn-danger"  title='Borrar proyecto desde a'><i class="fa fa-trash"></i></a> -->
                          
                        </tr>
                        <?php
                            }
                        ?>
                        </table>
                </table>          
                    </div>
                </div>
        </div>  
    </div>    

   