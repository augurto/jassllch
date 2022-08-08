
        <!--Ejemplo tabla con DataTables-->
        <?php require_once ('./config/conexion_tabla.php') ?>
        <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        
                        <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
                                    <th>Apellido</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                    
                                </tr>
                                </thead>
                             
                        <?php 
                           $count=1;
                        foreach ($link->query('SELECT * from usuarios_jass') as $row){ // aca se hace la consulta e iterarla con each. ?> 
                        <?php
                        $id_obra=$row['id_jass'];
                        $nombre_obra=$row['nombres'];
                        $fecha_agregada=$row['ap_paterno'];
                        $estado=$row['estado'];
                         if ($estado==0) { ?>
                             
                             <tr style="background-color: #F0FFFF !important;">

                             <?php  }elseif ($estado==1) { ?>
                             <tr style="background-color: #F0FFF0 !important;">

                             <?php  }elseif ($estado==2) { ?>
                             <tr style="background-color: #FFE4E1 !important;">
                       
                             <?php } else{?>
                             <tr style="background-color: #FDF5E6 !important;">
                             <?php }?>   
                            
                            <td><?php echo $count++; ?></td>
                            <td><a href="../../ver_obra.php?id_obra=<?php echo $id_obra; ?>"><?php echo $nombre_obra; ?></a></td>
                            <td><?php echo $fecha_agregada ?></td>
                            <td><?php if ($estado==0) {
                                # code...
                                echo 'Activo';
                            } elseif ($estado==1) {
                                # code...
                                echo 'Terminado';
                            } elseif ($estado==2) {
                                # code...
                                echo 'Inactivo';
                            }?></td>
                            <td>Boton Accion Pendiente</td>
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