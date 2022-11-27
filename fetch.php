<?php

include('connection.php');

$column = array('CPU', 'GPU', 'RAM', 'SSD', 'PSU', 'Case', 'Type');

$query = "
SELECT * FROM pc
";

if ($_POST['filter_Type'] != '') {
    $query .= ' 
    WHERE Type = "' . $_POST['filter_Type'] . '"
 ';
}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row['ID'];
    $sub_array[] = $row['CPU'];
    $sub_array[] = $row['GPU'];
    $sub_array[] = $row['RAM'];
    $sub_array[] = $row['SSD'];
    $sub_array[] = $row['PSU'];
    $sub_array[] = $row['Case'];
    $sub_array[] = $row['Type'];
    $sub_array[] = $row['Price'];
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM pc";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    "draw"       =>  intval($_POST["draw"]),
    "recordsTotal"   =>  count_all_data($connect),
    "recordsFiltered"  =>  $number_filter_row,
    "data"       =>  $data
);

echo json_encode($output);
