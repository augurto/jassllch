
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
                                    <th>A. Paterno</th>
                                    <th>A. Materno</th>
                                    <th>DNI</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                    
                                </tr>
                                </thead>
                             
                        <?php 
                           $count=1;
                        foreach ($link->query('SELECT * from usuarios_jass') as $row){ // aca se hace la consulta e iterarla con each. ?> 
                        <?php
                        $id_jass=$row['id_jass'];
                        $dni_jass=$row['dni_usuario_jass'];
                        $nombre=$row['nombres'];
                        $ap_paterno=$row['ap_paterno'];
                        $ap_materno=$row['ap_materno'];
                        $estado_civil=$row['estado_civil'];
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
                            <td><?php echo $ap_paterno ?></td>
                            <td><?php echo $ap_materno ?></td>
                            <td><?php echo $dni_jass ?></td>
                            <td><?php if ($estado==0) {
                                # code...
                                echo 'Activo';
                            } elseif ($estado==1) {
                                # code...
                                echo 'Terminado';
                            } elseif ($estado==2) {
                                # code...
                                echo 'Retirado';
                            }?></td>
                            <td>
                                         <button type="button" id="btnmodal0" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit0" data-idjass2="<?php echo $id_jass; ?>" data-nombres="<?php echo $nombre; ?>" data-ape="<?php echo $ap_paterno;?>" data-ape_mat="<?php echo $ap_materno;?>" data-estado_civil="<?php echo $estado_civil;  ?>" data-jass_dni="<?php echo $dni_jass;  ?>" >
                                        <i class="fa fa-edit"></i>
                                        </button>
                         
                                         <button type="button" id="btnmodal" class="btn btn-dark" data-toggle="modal" data-target="#ModalEdit" data-idjass="<?php echo $id_jass; ?>" data-nombre="<?php echo $nombre; ?>" data-paterno="<?php echo $ap_paterno;?>" data-materno="<?php echo $ap_materno;  ?>" data-dnijass="<?php echo $dni_jass;  ?>" >
                                         <i class="fa fa-plus"></i>
                                         
                                        </button>

                                        <button type="button" id="btnmodal" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit1" data-idjass="<?php echo $id_jass; ?>" data-nombre="<?php echo $nombre; ?>" data-paterno="<?php echo $ap_paterno;?>" data-materno="<?php echo $ap_materno;  ?>" data-dnijass="<?php echo $dni_jass;  ?>" >
                                        <i class="fa-thin fa-money-bill"></i>
                                         
                                        </button>
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