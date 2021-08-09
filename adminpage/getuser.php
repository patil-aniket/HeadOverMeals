<!DOCTYPE html>
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
        .limiter {
    width: 100%;
    margin: 0 auto;
  }

  
  
  .wrap-table100 {
    width: 100%;
  }
  
  .table100 {
    background-color: #fff;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
  }
  
  th, td {
    font-weight: unset;
    padding-right: 10px;
    border-collapse: collapse;
  }
  
  
  .table100-head th {
    padding-top: 18px;
    padding-bottom: 18px;
    margin: 0 50px;
  }
  
  .table100-body td {
    padding-top: 16px;
    padding-bottom: 16px;
    margin: 0 5px;
  }
  
  .table100 {
    position: relative;
    padding-top: 60px;
  }
  
  .table100-head {
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
  }
  
  .table100-body {
    max-height: 100%;
    overflow: auto;
  }
  
  .table100.ver2 {
    background-color: #393939;
  }
  
  .table100.ver2 th {
    font-family: Lato;
    font-weight: bold;
    font-size: 15px;
    color: #00ad5f;
    line-height: 1.4;
    text-transform: uppercase;
    background-color: #393939;
  }
  
  .table100.ver2 td {
    font-family: Lato;
    font-weight: 300;
    font-size: 15px;
    color: #fff !important;
    line-height: 1.4;
    background-color: #222222;
  }
  
  .table100.ver2 {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
    -webkit-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
    -o-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
    -ms-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  }


  .row{
    padding: 0 25px;
  }

.row1{
  padding: 0 50px;
}

.row2{
  padding-left: 80px;
}

@media screen and (max-width: 768px) {
    .table100.ver2 th{
      font-size: 13px;
      line-height: 1.1;
      padding-left: 0;
    }

    .table100.ver2 td{
      font-size: 13px;
      line-height: 1.3;
      padding-left: 10px;
    }

    .container-table100{
      padding-top: 100px;
    }

    .table100-head th{
      padding: 0px;
    }

    .row{
    padding: 0px;
    padding-left: 0px;
    margin: 0 40px;

  }

    .row1{
      padding: 0 2px 0 0;
    }

    .row2{
      padding-left: 0px;
    }
}

</style>
</head>
<body>
<div class="table-container">
    <?php
    require_once('../landingpage/config.php');
    $q = intval($_GET['q']);
    $sql="SELECT * FROM users WHERE id = '".$q."'";
    $result = mysqli_query($conn,$sql);

    echo '<div class="limiter">
        <div class="">
            <div class="wrap-table100">
                <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                                <tr class="">
                                    <th class="row">ID</th>
                                    <th class="row">USERNAME</th>
                                    <th class="row">EMAIL</th>
                                    <th class="row">REMOVE</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
        <table>
            <tbody>';
    while($row = mysqli_fetch_array($result)) {
    echo '<tr class="row100 body">';
        echo '<td class="row1">'. $row['id'] . '</td>';
        echo '<td class="row2">' . $row['username'] . '</td>';
        echo '<td class="row2">' . $row['email'] . '</td>';
        echo '<td class="row1"><form action="index.php" method="POST">
        <input hidden type="text" id="rId" name="user-info" value="'.$row['email'].'">
    <input type="submit" value="Remove User" name="remove-user" class="remove-user">
</form></td>';
      

        
    }
    

    echo "</tr>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>";
    
    mysqli_close($conn);
    ?>
</div>

</body>
</html>