<?php
include_once("dbconnect.php");
$userid = $_POST['userid'];
$sqlloadproduct = "SELECT * FROM tbl_books;";
$result = $conn‐>query($sqlloadbooks);

if ($result‐>num_rows > 0) {
    $response["books"] = array();
while ($row = $result‐>fetch_assoc()) {
        $prlist = array();
        $prlist['book_id'] = $row['book_id'];
        $prlist['user_id'] = $row['user_id'];
        $prlist['book_isbn'] = $row['book_isbn'];
        $prlist['book_title'] = $row['book_title'];
        $prlist['book_desc'] = $row['book_desc'];
        $prlist['book_author'] = $row['book_author'];
        $prlist['book_price'] = $row['book_price'];
        $prlist['book_qty'] = $row['book_qty'];
        $prlist['book_status'] = $row['book_status'];
        $prlist['book_date'] = $row['book_date'];
        array_push($response["products"],$prlist);
    }
    $response = array('status' => 'success', 'data' => $products);
    sendJsonResponse($response);
}else{
     $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
}
function sendJsonResponse($sentArray)
{
    header('Content‐Type: application/json');
    echo json_encode($sentArray);
}