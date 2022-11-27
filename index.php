<?php

include('connection.php');

$type = '';
$query = "SELECT DISTINCT Type FROM pc ORDER BY Type ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row) {
    $type .= '<option value="' . $row['Type'] . '">' . $row['Type'] . '</option>';
}
?>

<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<div class="w3-bar w3-black">
  <a href="index.php" class="w3-bar-item w3-button">Home</a>
  <a href="order.php" class="w3-bar-item w3-button">Order</a>
  <a href="contacts.php" class="w3-bar-item w3-button">Contacts</a>
</div>
<head>
    <title>KDB</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Bootstrap</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <!-- <nav class="navbar navbar-inverse"> -->
        <div>
        <img src="logo.png" class="center" alt="Logo" style="width:150px;height:150px; margin: right 10px; margin-bottom: 5px"> 
        </div>
    </nav>
    <div class="container box">
        <h3 align="center"></h3>
        <br />
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <select name="filter_Type" id="filter_Type" class="form-control">
                        <option value="">Select Computer Type</option>
                        <?php echo $type; ?>
                    </select>
                </div>
                <div class="form-group" align="center">
                    <button type="button" name="filter" id="filter" class="btn btn-success">Sort</button>
                    <button class="btn btn-danger" onClick="window.location.reload();">Clear</button>
                    <h3>List of all computers currently available<h3>
                </div>
        </div>
    </div>
</div>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
th {
  background-color: #303133;
  color: white;
}
tr:hover {background-color: #b9524b;}

body {
          background-image: url('background.gif');
          background-repeat: no-repeat;
          background-attachment: fixed;  
          background-size: cover;
        }
.center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
}
</style>
<div class="table-responsive">
            <table id="data" class="table">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="10%">CPU</th>
                        <th width="10%">GPU</th>
                        <th width="5%">RAM</th>
                        <th width="5%">SSD</th>
                        <th width="15%">PSU</th>
                        <th width="15%">Case</th>
                        <th width="5%">Type</th>
                        <th width="5%">Price</th>                        
                    </tr>
                </thead>
            </table>
            <br />
            <br />
            <br />
        </div>
</body>
<style>
body {
    color:white
}
</style>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        fill_datatable();

        function fill_datatable(filter_Type = '') {
            var dataTable = $('#data').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "searching": false,
                "ajax": {
                    url: "fetch.php",
                    type: "POST",
                    data: {
                        filter_Type: filter_Type
                    }
                }
            });
        }

        $('#filter').click(function() {
            var filter_Type = $('#filter_Type').val();
            if (filter_Type != ''){
                $('#data').DataTable().destroy();
                fill_datatable(filter_Type);
            } else {

            }
        });


    });
</script>
