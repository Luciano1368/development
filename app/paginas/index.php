<?php 
//URL DE LA PAGINA
include_once ('../../dist/conect/url.php');
//CONEXION A BASE DE DATOS
include_once ('../../dist/conect/dbConnect.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
      //LIBRERIAS Y CSS
      include_once('../../dist/includes/head.php'); 
    ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div id="overlay">
          <img src="../../assets/img/catSpinner.gif" alt="">
        </div>
        <?php include_once('../../dist/includes/sidebar.php'); ?>
        <?php include_once('../../dist/includes/navbar.php'); ?>

        <!-- page content -->
        
        <div class="right_col" role="main">
          
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-12">
                    <h3>API REST CHALLENGE</h3>
                  </div>
                </div>
                <div class="row x_title">
                  <div class="col-lg-5 col-md-12 col-sm-12 mr-3 mt-3 text-center">
                    <button type="button" class="btn btn-primary" id="btnTraerDatos">TRAER DATOS API</button>
                  </div>
                  <div class="col-lg-5 col-md-12 col-sm-12 mr-3 mt-3 text-center">
                    <a href="datos.php" class="btn btn-info" id="btnMostrar">MOSTRAR DATOS</a>
                  </div>
                </div>


                <?php 
                  $query = "SELECT * FROM post_request ";
                  $busca = mysqli_query($conn, $query) or die(mysqli_error($conn));
                  $row = mysqli_num_rows($busca);
                ?>
                <?php if ($row >0): ?>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                    
                      <table width="100%" class="table table-striped table-bordered table-hover text-center" id="tabla_usuarios">
                        <thead>
                          <tr class="thead-dark ">
                            <th class="text-center">HORA</th>
                            <th class="text-center">FECHA</th>
                            <th class="text-center">CANTIDAD</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $query = "SELECT * FROM post_request ";
                            $busca = mysqli_query($conn, $query) or die(mysqli_error($conn));

                            while ($row = mysqli_fetch_array($busca)) { ?>
                            <tr class="odd gradeX">
                              <td><?php echo $row['timeReq'];?></td>
                              <td><?php echo $row['hourReq']; ?></td>
                              <td><?php echo $row['contador']; ?></td>
                            </tr>
                            <?php }

                         ?>
                        </tbody>
                      </table>
                          
                    </div>
                  </div>
                  
                <?php endif ?>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />
        </div>




        <?php include_once('../../dist/includes/footer.php'); ?>
      </div>
    </div>

    <?php include_once('../../dist/includes/jsFooter.php'); ?>
	<script type="text/javascript" src="<?php echo $uri ?>/dist/js/Api/Api.js"></script>
  </body>
</html>

















