<?php  
require_once 'C:/Program Files/VertrigoServ/www/Du_An_1_Poly_Hotel/libraries/database.php';

function get_one_production($id) {
    $result = db_fetch_row("SELECT p.*,u.full_name as `full_name` FROM `productions` p JOIN `users` u ON p.created_id = u.id WHERE p.id = $id");
    return $result;
}

function get_list_bill() {
    $result = db_fetch_array("SELECT * FROM `bill`");
    return $result;
}

function get_list_bill_detail() {
    $result = db_fetch_array("SELECT * FROM `bill_details`");
    return $result;
}

function get_one_bill($created_id){
    $result = db_fetch_row("SELECT * FROM `bill` WHERE created_id = $created_id");
    return $result;
}

function get_bill_detail_by_id($created_id){
    $result = db_fetch_array("SELECT b.created_id, bd.*, p.name as `name`, p.price as `price` FROM `bill` b INNER JOIN `bill_details` bd ON b.id = bd.bill_id INNER JOIN productions p ON p.id = bd.product_id WHERE b.created_id = $created_id");
    return $result;
}

function get_list_bill_product(){
    $result = db_fetch_array("SELECT bd.*, p.name as `name` FROM `bill_details` bd INNER JOIN  `productions` p ON bd.product_id = p.id");
    return $result;
}

function insert_bill($data){
    $columns = implode(", ", array_keys($data));
    $values = ":" . implode(", :", array_keys($data));
    $sql = "INSERT INTO `bill` ($columns) VALUES ($values)";
    db_query($sql, $data);
}

if (!function_exists('insert_bill_detail')) {
    function insert_bill_detail($data) {
        $conn = DATABASE::connect();

        // Các cột sẽ được chèn
        $columns = implode(', ', array_keys($data));

        // Các địa điểm tên được đặt tên cho các giá trị
        $placeholders = ':' . implode(', :', array_keys($data));

        // Câu truy vấn SQL
        $sql = "INSERT INTO `bill_details` ($columns) VALUES ($placeholders)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute($data);

            // Trả về ID vừa chèn
            return $conn->lastInsertId();
        } catch (PDOException $ex) {
            ShowError($ex);
        }
    }
}
