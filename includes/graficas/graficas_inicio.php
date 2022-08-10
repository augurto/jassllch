<?php

     $tp=mysqli_query($con,"SELECT count(*) as tp FROM proyecto where estado='0'");
      $rwp=mysqli_fetch_array($tp);
      $tps=$rwp["tp"];

      $te=mysqli_query($con,"SELECT count(*) te FROM proyecto where estado='1'");
      $rwe=mysqli_fetch_array($te);
      $tes=$rwe["te"];

      $ti=mysqli_query($con,"SELECT count(*) ti FROM proyecto  where estado='2'");
      $rwi=mysqli_fetch_array($ti);
      $tin=$rwi["ti"];

      $sol=mysqli_query($con,"SELECT sum(presupuesto) sol FROM proyecto  where estado='1'");
      $sole=mysqli_fetch_array($sol);
      $soles=$sole["sol"];

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
                      <div class="h5 mb-0 font-weight-bold text-gray-800">S/<?php echo number_format($soles,2);?></div>
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
              <a href="../../index.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proyectos Pendientes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tps;?></div>
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
              <a href="../../proyectos_terminados.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proyectos   Terminados </div>
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
              <a href="../../proyectos_inactivos.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proyectos Inactivos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tin;?></div>
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