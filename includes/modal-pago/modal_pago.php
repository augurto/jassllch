<script >
                                      $(document).on("click", "#btnmodal",function () {
                                        
                                              var idjass =$(this).data('idjass');
                                              var nombre =$(this).data('nombre');
                                              var paterno =$(this).data('paterno')
                                              var materno =$(this).data('materno');
                                              var dnijass =$(this).data('dnijass');
                                             

                                        $("#idjass").val(idjass);
                                        $("#nombre").val(nombre);

                                        
                                        $("#paterno").val(paterno);
                                        $("#materno").val(materno);
                                        $("#datos").val(nombre+" "+paterno+" "+materno);
                                        $("#dnijass").val(dnijass);
                          
                                      })

                                    </script>

<!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pago</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    
                    <label for=""><?php
                        $var_PHP = "<script> document.write(estado) </script>"; // igualar el valor de la variable JavaScript a PHP 

                    echo $var_PHP   // muestra el resultado 

                    ?></label>
                    <script>
                        //Función que realiza la suma
                        function Suma() {
                        var monto_pago = document.calculadora.monto_pago.value;
                        var deuda = document.calculadora.deuda.value;
                        var cantidadmes = document.calculadora.cantidadmes.value;
                        try{
                            //Calculamos el número escrito:
                            monto_pago = (isNaN(parseInt(monto_pago)))? 0 : parseInt(monto_pago);
                            deuda = (isNaN(parseInt(deuda)))? 0 : parseInt(deuda);
                            cantidadmes = (isNaN(parseInt(cantidadmes)))? 0 : parseInt(cantidadmes);
                            document.calculadora.vuelto.value = monto_pago-(deuda*cantidadmes);
                        }
                        //Si se produce un error no hacemos nada
                        catch(e) {}
                        }
                    </script>

                    <form action="../../includes/process/nuevo_pago.php" name="calculadora">
                        <div class="modal-body">
                        <div class="input-group mb-3">
                       <!--  <span class="input-group-text" id="basic-addon1">Cod Usuario</span> -->
                        <input type="hidden" class="form-control" id="idjass" name="idjass" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">DNI</span>
                        
                        <input type="text" class="form-control" id="dnijass" name="dnijass" aria-label="DNI" aria-describedby="basic-addon1" readonly >
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Datos</span>
                        <input type="text" class="form-control" id="datos" name="datos" aria-label="Username" aria-describedby="basic-addon1"  readonly>
                        
                        <?php 
                        $mes_actual =date("m");
                        $year_actual =date("Y");
                        date_default_timezone_set("America/Lima");
                        $hoy = date("Y-m-d H:i:s");     
                        ?>
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">1er mes de pago</span>
                        
                        
                            <select class="form-select"  name="mes_pago" id="mes_pago" required>
                            
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                            </select>
                            <!-- <select name="mes_pago" id="mes_pago" class="form-select" required>
                                <?php
                                    $mes=date("n"); 
                                    $rango=11; 
                                    for ($i=$mes;$i<=$mes+$rango;$i++){ 
                                        $mesano=date('Y-n', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                        $meses=date('F', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                        if ($meses=="January") $meses="Enero";
                                        if ($meses=="February") $meses="Febrero";
                                        if ($meses=="March") $meses="Marzo";
                                        if ($meses=="April") $meses="Abril";
                                        if ($meses=="May") $meses="Mayo";
                                        if ($meses=="June") $meses="Junio";
                                        if ($meses=="July") $meses="Julio";
                                        if ($meses=="August") $meses="Agosto";
                                        if ($meses=="September") $meses="Septiembre";
                                        if ($meses=="October") $meses="Octubre";
                                        if ($meses=="November") $meses="Noviembre";
                                        if ($meses=="December") $meses="Diciembre";
                                        $ano=date('Y', mktime(0, 0, 0, $i, 1, date("Y") ) );
                                        echo "<option value='$mes'>$i</option>"; 
                                    } 
                                ?> 
                                </select> -->
                        </div> 
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">1er mes de pago</span>
                        
                        
                        <select class="form-select"  name="ulti_mes_pago" id="ulti_mes_pago" required>
                        
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                        </select>
                                        
                        </div> 
                        <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Cantidad de meses a pagar</label>
                                <input type="number" class="form-control" id="cantidadmes"  name="cantidadmes" aria-label="DNI" aria-describedby="basic-addon1"  onKeyUp="Suma()" value="1" min="1" max="12" required >
                                        
                        </div> 
                        <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Año </label>
                                <input type="number" class="form-control" id="year_actual" name="year_actual"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $year_actual;?>"  min="2018" required >
                                        
                        </div> 
                        <!-- <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Con cuanto paga</label>
                                <input type="text" class="form-control" id="monto_pago" autofocus name="monto_pago" aria-label="DNI" aria-describedby="basic-addon1"  onKeyUp="Suma()" required >
                                        
                        </div> 
                          
                         -->
                        <div class="input-group mb-3">
                               <!--  <label class="input-group-text" for="inputGroupSelect01">Monto a Pagar</label> -->
                                <input type="hidden" class="form-control" id="deuda" name="deuda"  aria-label="DNI" aria-describedby="basic-addon1" value="5"  onKeyUp="Suma()" readonly >
                                <!-- <label class="input-group-text" for="inputGroupSelect01">Vuelto</label>
                                <input type="text" class="form-control" id="vuelto" name="vuelto" aria-label="DNI" aria-describedby="basic-addon1" readonly > -->
                                        
                        </div>  
                         
                        <div class="input-group mb-3">
                       <!--  <span class="input-group-text" id="basic-addon1">Hoy</span> -->
                        <input type="hidden" class="form-control" id="hoy" name="hoy"  aria-label="hoy" aria-describedby="basic-addon1" value="<?php echo $hoy;?>"  readonly >
                                               
                        </div>
                        <div class="input-group mb-3">
                        
                        
                       <!--  <span class="input-group-text" id="basic-addon1">Mes</span> -->
                        
                        <input type="hidden" class="form-control" id="mes_actual" name="mes_actual" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $mes_actual;?>" readonly >
                      <!--   <span class="input-group-text" id="basic-addon1">Año</span> -->
                      <!--   <input type="number" class="form-control" id="year_actual" name="year_actual"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $year_actual;?>"  readonly> -->
                        
                        </div>
                        <div class="input-group mb-3">
                      <!--   <span class="input-group-text" id="basic-addon1">Usuario</span> -->
                        <input type="hidden" class="form-control" id="name_user" name="name_user"  aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $usuario;?>"  readonly>
                        <input type="hidden" class="form-control" id="id_user" name="id_user" aria-label="DNI" aria-describedby="basic-addon1" value="<?php echo $id_usuario;?>"  readonly>
                       
                       
                        </div>
                                    
                        

                        
                                          
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Pagar</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>

