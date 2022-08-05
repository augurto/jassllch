<?php 
$uno=mysqli_query($con,"SELECT * FROM users where id='".$id_usuario."'");
$dos=mysqli_fetch_array($uno);
$tipo_user=$dos['tipo_user'];
$username2=$dos['username'];

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <!-- <a class="navbar-brand" href="#">Logo Jass</a> -->
  <!-- sigiueinte l;inea va el logo -->
  <!-- <img src="../img/logo.png" alt="" width="40px" height="40px"> -->
  <!-- <a class="navbar-brand" href="#">Bienvenido </a> -->
 
  <button type="button" class="btn btn-primary position-relative">
  <?php echo $username2; ?>
  <?php if ($tipo_user==0) {?>
    
  
  <span class="position-absolute top-0 start-100 translate-middle p-2 bg-primary border border-light rounded-circle">
    <span class="visually-hidden">Colaborador</span>
  </span>
    <?php }else {?>
      <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
    <span class="visually-hidden">Administrador</span>
  </span>
   <?php }?>
</button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Proyectos</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="../inventario_general.php">Inventario General</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="../datos_personales.php">Actualizar Datos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reportes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="../reporte_entregable.php" >Entregables </a></li>
          <li><a class="dropdown-item" href="../reporte_entregable0.php" >Entregables vacios </a></li>
          <li><a class="dropdown-item" href="../reporte_grafica.php" >Reporte de Proyectos </a></li>
          <li><a class="dropdown-item" href="../reporte_rendimiento.php">Reporte rendimiento </a></li>
          <li><a class="dropdown-item" href="../reporte_usuario.php?usuario=<?php echo $usuario;?>" >Reporte de Usuarios </a></li>
            <li><a class="dropdown-item" href="#">Grupos</a></li>
            
          </ul>
        </li>
        <?php if ($tipo_user==4) {?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../usuarios/">Asignar a Proyectos</a></li>
            <li><a class="dropdown-item" href="#">Ver Usuarios</a></li>
            <!-- <li><a class="dropdown-item" href="#">Elemento 3</a></li> -->
          </ul>
        </li>
          <?php } ?>
      
        <li class="nav-item">
          <a class="nav-link" href="../login/logout.php">Salir</a>
        </li>
      </ul>
    </div>
  </div>
</nav>