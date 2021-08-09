<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
        .limiter {
    width: 100%;
    margin: 0 auto;
  }
  
  .container-table100 {
    margin-left: auto;
    margin-right: auto;
    padding: 10%;
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
  }
  
  .table100-body td {
    padding-top: 16px;
    padding-bottom: 16px;
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
  
  .table100.ver3 {
    background-color: #393939;
  }
  
  .table100.ver3 th {
    font-family: Lato;
    font-weight: bold;
    font-size: 15px;
    color: #00ad5f;
    line-height: 1.4;
    text-transform: uppercase;
    background-color: #393939;
  }
  
  .table100.ver3 td {
    font-family: Lato;
    font-weight: 300;
    font-size: 15px;
    color: #fff !important;
    line-height: 1.4;
    background-color: #222222;
  }
  
  .table100.ver3 {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
    -webkit-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
    -o-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
    -ms-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  }

  .column1 {
    width: 20%;
    align-items: center;
    padding-left: 30px;

  }

  .email-column{
    padding-left: 0;
  }
  
  .column2 {
    width: 60%;
  }

  @media screen and (max-width: 768px) {
    .table100.ver3 th{
      font-size: 14px;
      line-height: 1.5;
    }

    .table100.ver3 td{
      font-size: 13px;
      line-height: 1.5;
    }

    .container-table100{
      padding-top: 100px;
    }

    .table100-head th{
      padding-left: 30px;
    }
}



    </style>
</head>
<body>
    <div class="review-table">
    <?php

        include('../landingpage/config.php');
        $sql = "SELECT * FROM reviews";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {

        // output data of each row
        echo '<div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver3 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                                <tr class="row100 head">
                                    <th class="cell100 column1 email-column">EMAIL</th>
                                    <th class="cell100 column2">REVIEW</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
        <table>
            <tbody>';
        while($row = mysqli_fetch_assoc($result)) {

        echo '<tr class="row100 body">';
        echo '<td class="cell100 column1">'. $row['email'] . '</td>';
        echo '<td class="cell100 column2">' . $row['review'] . '</td>';
        
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

        }

    ?>
    </div>
</body>
</html>
