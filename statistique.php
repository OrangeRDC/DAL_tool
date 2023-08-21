<?php
$con = mysqli_connect("localhost","root","","cms_db");
if(!$con){
die("Connection Failed:".mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Statistique du Volume d'importations</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
      <div class="card-header bg">
        <h1>Statistique du Volume d'importations</h1>
      </div>
          <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Volumes d'importation Aerien</th>
                

              </tr>
            </thead>
            <tbody>
              <?php
              $result = $con->query("SELECT * FROM parcels WHERE type = 1 ");
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){?>
                <tr>
                 
                 
                </tr>
                <?php
              }
            }
            else{?>
              <tr>
                <td colspan="7">No data Found...</td>
              </tr>
            </tbody>
            <?php } ?>
          </table>
          <table>
            <div>
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE length = 'FBM'AND type = 1") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          Poids Total FBM : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
        </div>
      </table>
      <br>
      <table>
            <div>
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE length = 'KIN'AND type = 1") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          Poids Total KIN : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
        </div>
        <br>
       
         <div>
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE length = 'MTD'AND type = 1") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          Poids Total MTD : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
        </div>
      </tr>
        <br>
         <div>
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE length = 'GOMA'AND type=1") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          Poids Total GOMA : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
        </div>
      </table>
      <br>
          <div>
        
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE type = 1") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          POIDS TOTAL EN KG : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>

          <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                
                <th>Importation Maritime</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              $result = $con->query("SELECT * FROM parcels WHERE type = 2");
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){?>
                <tr>
                 
                 
                </tr>
                <?php
              }
            }
            else{?>
              <tr>
                <td colspan="7">No data Found...</td>
              </tr>
            </tbody>
            <?php } ?>
          </table>
          <table>
            <div>
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE length = 'FBM' AND type = 2") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          Nombre des conteneurs FBM : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
        </div>
      </table>
      <br>
      <table>
            <div>
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE length = 'KIN'AND type = 2") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
         Nombre des conteneurs KIN : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
        </div>
        <br>
       
         <div>
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE length = 'MTD'AND type = 2") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          Nombre des conteneurs MTD : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
        </div>
      </tr>
        <br>
         <div>
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE length = 'GOMA'AND type = 2") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          Nombre des conteneurs GOMA : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
        </div>
      </table>
      <br>
          
          <div>
        
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE type = 2") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          total 20P : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
          </div>
          <br>
          <div>
        
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE type = 2") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          total 40P : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
          </div>
          <br>
          <div>
        
          <?php
          $results = mysqli_query($con, "SELECT sum(weight) FROM parcels WHERE type = 2") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          Nombres total : <?php echo $rows['sum(weight)' ]; ?>
<?php
          }
          ?>
          </div>
          
          </div>
      </div>
    </div>
  </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>