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
                  <div class="col-lg-5 col-md-12 col-sm-12 mr-3 mt-3">
                    <a href="index.php" class="btn btn-primary" >ATRAS</a>
                  </div>
                  
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="row">
                  
                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabla_usuarios">
                      <thead>
                        <tr class="thead-dark">
                          <th>ID USER</th>
                          <th>ID</th>
                          <th>TITLE</th>
                          <th>BODY</th>
                          <th>ACCIONES</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query = "SELECT * FROM post ";
                          $busca = mysqli_query($conn, $query) or die(mysqli_error($conn));

                          while ($row = mysqli_fetch_array($busca)) { ?>
                          <tr class="odd gradeX">
                            <td><?php echo $row['userId'];?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['body']; ?></td>
                            <td>
                              <button type="button" class="btn btn-primary" id="btnVerdatos" value="<?php echo $row['id'] ?>" onclick="mostrarDatos(this.value);">VER</button>
                              
                            </td>
                          </tr>
                          <?php }

                       ?>
                      </tbody>
                      
                    </table>
                        
                  </div>
                </div>

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
	 <script type="text/javascript">
      //$('#tabla_usuarios').DataTable({});



      // Setup - add a text input to each footer cell
        $('#tabla_usuarios thead th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" class="text-center" placeholder="' + title + '" />');
        });
     
        // DataTable
        var table = $('#tabla_usuarios').DataTable({fixedHeader: true,paging:true, ordering:false ,searching:true, bInfo:true, lengthChange:true,
            initComplete: function () {
                // Apply the search
                this.api()
                    .columns()
                    .every(function () {
                        var that = this;
     
                        $('input', this.header()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
        });





    </script>

    <script type="text/javascript" src="<?php echo $uri ?>/dist/js/Api/Api.js"></script>
  </body>
</html>

















