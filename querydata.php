<?php

include_once ("core.php");

$connect = mysqli_connect("localhost", "u491894228_jcytf_user","HostingerAwesome123","u491894228_jcytf_db");


// set pagination variables
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per_page']) && $_GET['per_page'] <= 50 ? (int)$_GET['per_page'] : 10;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// build query
$sql = "SELECT * FROM tblevents WHERE Status = '1'";

// add search query to WHERE clause if set
if (isset($_GET['search'])) {
  $search = mysqli_real_escape_string($connect, $_GET['search']);
  $sql .= " AND (EventName LIKE '%{$search}%')";
}

// add month filter to WHERE clause if set
if (isset($_GET['month'])) {
  $month = mysqli_real_escape_string($connect, $_GET['month']);
  $month_number = date('m', strtotime($month));
  $sql .= " AND MONTH(Date) = '{$month_number}'";
}

// get total records count
$total = mysqli_query($connect, "SELECT COUNT(*) as total FROM tblevents WHERE Status = '1'");
$total = mysqli_fetch_assoc($total)['total'];

// calculate total pages based on the number of results returned by the current query
$pages = ceil(mysqli_num_rows(mysqli_query($connect, $sql)) / $perPage);

$sql .= " ORDER BY ID DESC LIMIT {$start}, {$perPage}";
$result = mysqli_query($connect, $sql);

// build pagination array
$pagination = [
    'page' => $page,
    'per_page' => $perPage,
    'total' => $total,
    'total_pages' => $pages,
    'data' => []
];

// loop through query results and add to pagination array
while($row = mysqli_fetch_assoc($result)){
    $pagination['data'][] = $row;
}

// send pagination array as JSON response
header('Content-Type: application/json');
echo json_encode($pagination);

?>
