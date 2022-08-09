
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
                                    <th>Fecha Pago</th>
                                    <th>Cajero</th>
                                    <th>Pago mes</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                    
                                </tr>
                                </thead>
                             
                        <?php 
                           $count=1;
                           $dni_url=$_GET['dni'];
                        foreach ($link->query('SELECT * from pagos where dni_usuario_jass = "'.$dni_url.'"') as $row){ // aca se hace la consulta e iterarla con each. ?> 
                        <?php
                        $id_jass=$row['id_pagos'];
                        $dni_jass=$row['dni_usuario_jass'];
                        $nombre=$row['datos_pago'];
                        $pago_hoy=$row['pago_hoy'];
                        $name_user=$row['name_user'];
                        $pago_mes=$row['pago_mes'];
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
                            <td><a href="../../usuario_jass.php?dni=<?php echo $dni_jass; ?>"><?php echo $nombre; ?></a></td>
                            <td><?php echo $pago_hoy ?></td>
                            <td><?php echo $name_user ?></td>
                            <td><?php echo $pago_mes ?></td>
                            <td><?php if ($estado==0) {
                                # code...
                                echo 'Pagado';
                            } elseif ($estado==1) {
                                # code...
                                echo 'Terminado';
                            } elseif ($estado==2) {
                                # code...
                                echo 'Retirado';
                            }?></td>
                            <td>        
                                         <!-- <button type="button" id="btnmodal0" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit0" data-id_jass="<?php echo $codigo; ?>" data-nombre="<?php echo $nombre; ?>" data-ape="<?php echo $presupuesto;?>" data-estado="<?php echo $estado;  ?>" data-sub2="<?php echo $extencion;  ?>" >
                                        <i class="fa fa-edit"></i>
                                        </button> -->
                                        <a href="../includes/pdf/boleta_pago.php" target="_blank">
                                         <button type="button" id="btnmodal" class="btn btn-dark" data-toggle="modal" data-target="#ModalEdit" data-jass="<?php echo $id_jass; ?>" data-nombre="<?php echo $nombre; ?>" data-paterno="<?php echo $ap_paterno;?>" data-materno="<?php echo $ap_materno;  ?>" data-dni="<?php echo $dni;  ?>" >
                                         <i class="fa fa-print"></i>
                                         
                                        </button>
                                        </a>
                            </td>
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