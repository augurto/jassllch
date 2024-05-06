<!--Ejemplo tabla con DataTables-->
<?php require_once('./config/conexion_tabla.php') ?>
<div class="container-fluid ">
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
                            <th>Sector</th>
                            <th>Cant. Fam.</th>
                            <th>Natural de</th>
                            <!--  <th>Estado</th> -->
                            <th>Accion</th>

                        </tr>
                    </thead>

                    <?php
                    $count = 1;
                    foreach ($link->query('SELECT * from usuarios_jass where estado_usuario_jass = 0') as $row) { // aca se hace la consulta e iterarla con each. 
                    ?>
                        <?php
                        $id_jass = $row['id_jass'];
                        $dni_jass = $row['dni_usuario_jass'];
                        $nombre = $row['nombres'];
                        $ap_paterno = $row['ap_paterno'];
                        $ap_materno = $row['ap_materno'];
                        $estado_civil = $row['estado_civil'];
                        $estado = $row['estado'];
                        $sector_jass = $row['sector_jass'];
                        $natural_de = $row['natural_de'];
                        $cantidad_miembros = $row['cantidad_miembros'];
                        if ($estado == 0) { ?>

                            <tr style="background-color: #F0FFFF !important;">

                            <?php  } elseif ($estado == 1) { ?>
                            <tr style="background-color: #F0FFF0 !important;">

                            <?php  } elseif ($estado == 2) { ?>
                            <tr style="background-color: #FFE4E1 !important;">

                            <?php } else { ?>
                            <tr style="background-color: #FDF5E6 !important;">
                            <?php } ?>

                            <td><?php echo $count++; ?></td>
                            <td><a href="../../usuario_jass.php?dni=<?php echo $id_jass; ?>"><?php echo $nombre; ?></a></td>
                            <td><?php echo $ap_paterno ?></td>
                            <td><?php echo $ap_materno ?></td>
                            <td><?php echo $dni_jass ?></td>
                            <td><?php echo $sector_jass ?></td>
                            <td><?php echo $cantidad_miembros ?></td>
                            <td><?php echo $natural_de ?></td>
                            <!--   <td><?php if ($estado == 0) {

                                            echo 'Activo';
                                        } elseif ($estado == 1) {

                                            echo 'Terminado';
                                        } elseif ($estado == 2) {

                                            echo 'Retirado';
                                        } ?></td> -->
                            <td>
                                <!-- <button type="button" id="btnmodal0" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit0" data-idjass2="<?php echo $id_jass; ?>" data-nombres="<?php echo $nombre; ?>" data-ape="<?php echo $ap_paterno; ?>" data-ape_mat="<?php echo $ap_materno; ?>" data-estado_civil="<?php echo $estado_civil;  ?>" data-jass_dni="<?php echo $dni_jass;  ?>" >
                                        <i class="fa fa-edit"></i>
                                        </button> -->

                                <button type="button" id="btnmodal0" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit0" data-idjass2="<?php echo $id_jass; ?>" data-nombres="<?php echo $nombre; ?>" data-ape="<?php echo $ap_paterno; ?>" data-ape_mat="<?php echo $ap_materno; ?>" data-estado_civil="<?php echo $estado_civil; ?>" data-jass_dni="<?php echo $dni_jass; ?>" data-sector_jass="<?php echo $sector_jass; ?>" data-cantidad="<?php echo $cantidad_miembros; ?>" data-natural="<?php echo $natural_de; ?>">
                                    <i class="fa fa-edit"></i> Editar
                                </button>


                                <button type="button" id="btnmodal" class="btn btn-dark" data-toggle="modal" data-target="#ModalEdit" data-idjass="<?php echo $id_jass; ?>" data-nombre="<?php echo $nombre; ?>" data-paterno="<?php echo $ap_paterno; ?>" data-materno="<?php echo $ap_materno;  ?>" data-dnijass="<?php echo $dni_jass;  ?>">
                                    <i class="fa fa-plus"></i>

                                </button>

                                <button type="button" id="btnmodall" class="btn btn-warning" data-toggle="modal" data-target="#ModalEditt" data-unno="<?php echo $id_jass; ?>" data-dos="<?php echo $nombre; ?>" data-tres="<?php echo $ap_paterno; ?>" data-cuatro="<?php echo $ap_materno;  ?>" data-dnijass3="<?php echo $dni_jass;  ?>">
                                    <i class="fa fa-plus"></i>

                                </button>

                                <a href="includes/insertar/actualizar_eliminar.php?id=<?php echo $id_jass; ?>"><i class="fa fa-trash"></i></a>

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