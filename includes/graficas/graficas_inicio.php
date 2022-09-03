<?php

     $tp=mysqli_query($con,"SELECT count(*) as tp FROM usuarios_jass where estado_usuario_jass='0'");
      $rwp=mysqli_fetch_array($tp);
      $tps=$rwp["tp"];

      $te=mysqli_query($con,"SELECT count(*) te FROM pagos where estado_pago='0'");
      $rwe=mysqli_fetch_array($te);
      $tes=$rwe["te"];

      $ti=mysqli_query($con,"SELECT sum(deuda) ti FROM pagos  where estado_pago='1'");
      $rwi=mysqli_fetch_array($ti);
      $tin=$rwi["ti"];

      $sol=mysqli_query($con,"SELECT sum(deuda) sol FROM pagos  where estado_pago='0'");
      $sole=mysqli_fetch_array($sol);
      $soles=$sole["sol"];

      $total_monto=$soles-$tin;
		$sql="SELECT * FROM  proyecto order by id desc";
		$query = mysqli_query($con, $sql);         
			?>
<div class="container">
<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">S/<?php echo number_format($total_monto,2);?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign  fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
              <button type="button" class="btn btn-light" id="boton_proyecto" data-toggle="modal" data-target="#egreso">
              <!-- <a href="../../index.php"> -->
        
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Registrar Egreso</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">S/<?php echo  number_format($tin,2);?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
            
                </button>
              </div>
            </div>
            

            <!-- Earnings (Monthly) Card Example -->
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
              <a href="../../reporte_general.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Reporte General </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tes;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            

            <!-- Earnings (Monthly) Card Example -->
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
              <a href="../../pagos_varios.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> IngresoS</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">S/<?php echo number_format($soles,2);?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            



            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Terminado</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $tes;?></div>
                        </div>
                        <div class="col">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Inactivo</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tin;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->


            
          </div>
</div>