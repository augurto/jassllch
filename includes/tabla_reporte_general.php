
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
                                    <th>Nro Boleta</th>
                                    <th>Fecha Pago</th>
                                    <th>Cajero</th>
                                    <th>Pago mes</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                    
                                </tr>
                                </thead>
                             
                        <?php 
                           $count=1;
                           $dni_url=$_GET['dni'];
                        foreach ($link->query('SELECT * from pagos') as $row){ // aca se hace la consulta e iterarla con each. ?> 
                        <?php
                        $id_jass=$row['id_pagos'];
                        $dni_jass=$row['dni_usuario_jass'];
                        $nombre=$row['datos_pago'];
                        $pago_hoy=$row['pago_hoy'];
                        $name_user=$row['name_user'];
                        $pago_mes=$row['mes_actual_pago'];
                        $monto_pago=$row['monto_pago'];
                        $deuda=$row['deuda'];
                        $vuelto=$row['vuelto'];
                        $estado=$row['estado_pago'];
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
                           
                            <td><?php if ($estado==0) {
                                # code...
                                echo 'ING-'.$id_jass;
                            } elseif ($estado==1) {
                                # code...
                                echo 'EGR-'.$id_jass;
                            } elseif ($estado==2) {
                                # code...
                                echo 'Otro';
                            }?></td>
                            
                            <td><?php echo $pago_hoy ?></td>
                            <td><?php echo $name_user ?></td>
                            <td><?php 
                            
                            switch ($pago_mes) {
                                case 1:
                                    echo "Enero";
                                    break;
                                    case 2:
                                        echo "Febrero";
                                        break;
                                        case 3:
                                            echo "Marzo";
                                            break;
                                            case 4:
                                                echo "Abril";
                                                break;
                                                case 5:
                                                    echo "Mayo";
                                                    break;
                                                    case 6:
                                                        echo "Junio";
                                                        break;
                                                        case 7:
                                                            echo "Julio";
                                                            break;
                                                            case 8:
                                                                echo "Agosto";
                                                                break;
                                                                case 9:
                                                                    echo "Septiembre";
                                                                    break;
                                                                    case 10:
                                                                        echo "Octubre";
                                                                        break;
                                                                        case 11:
                                                                            echo "Noviembre";
                                                                            break;
                                                                            case 12:
                                                                                echo "Diciembre";
                                                                                break;
                                
                            }
                            
                            
                            
                            ?></td>
                            <td><?php echo 'S/ '.number_format($deuda, 2, ".",",") ?></td>
                            <td><?php if ($estado==0) {
                                # code...
                                echo 'Ingreso';
                            } elseif ($estado==1) {
                                # code...
                                echo 'Egreso';
                            } elseif ($estado==2) {
                                # code...
                                echo 'Otro';
                            }?></td>
                            <td>        
                                         <!-- <button type="button" id="btnmodal0" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit0" data-id_jass="<?php echo $codigo; ?>" data-nombre="<?php echo $nombre; ?>" data-ape="<?php echo $presupuesto;?>" data-estado="<?php echo $estado;  ?>" data-sub2="<?php echo $extencion;  ?>" >
                                        <i class="fa fa-edit"></i>
                                        </button> -->
                                        <a href="../includes/pdf/boleta_pago.php?dni=<?php echo $dni_jass; ?>&datos=<?php echo $nombre; ?>&fecha_pago=<?php echo $pago_hoy; ?>&usuario_atencion=<?php echo $name_user; ?>&pago_mes=<?php echo $pago_mes; ?>&monto_mes=<?php echo $monto_pago; ?>&monto_usuario=<?php echo $deuda; ?>&vuelto=<?php echo $vuelto; ?>&estado=<?php 
                                        if ($estado==0) {
                                            echo 'Agua';
                                        }else{
                                            echo 'Pago';
                                        }
                                         ?>&id_pago=<?php echo $id_jass; ?>" target="_blank">
                                         <!-- <button type="button" id="btnmodal" class="btn btn-dark" data-toggle="modal" data-target="#ModalEdit" data-jass="<?php echo $id_jass; ?>" data-nombre="<?php echo $nombre; ?>" data-paterno="<?php echo $ap_paterno;?>" data-materno="<?php echo $ap_materno;  ?>" data-dni="<?php echo $dni;  ?>" >
                                         <i class="fa fa-print"></i>
                                         
                                        </button> -->
                                        <i class="fa fa-file" aria-hidden="true"></i>
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