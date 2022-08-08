
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
                                    <th>Usuario</th>
                                    
                                    
                                    
                                    
                                    
                                </tr>
                        </thead>
                        <?php 
                        $count=1;
                        foreach ($link->query('SELECT * from usuarios_jass') as $row){ // aca se hace la consulta e iterarla con each. ?> 
                        <?php
                        
                        $id=$row['id_jass'];
                        $nombres=$row['nombres'];
                       
                        /* $fecha_actual=strtotime(date("Y-m-d",time()));
                        $fecha2=strtotime($fecha_fin);   */ 
                        
                       ?>
                             
                             <tr>

                            
                             <td><?php echo $count++; ?></td>
                             
                             <td><span id="firstname<?php echo $nombres; ?>"><?php echo $nombres; ?></span></td>
                             
                           
                          
                         
                          
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

   