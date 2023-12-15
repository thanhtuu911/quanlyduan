<?php
// Hàm kết nối dữ liệu
class DATABASE{
    private static $dns = "mysql:host=localhost;dbname=projectmvc;port=3306";
    private static $username = "root";
    private static $password = "vertrigo";
    private static $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
                                    PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");    
    private static $db;
    
    private function __construct(){} 
    
    public static function connect(){
        if(!isset(self::$db)){
            try{
                self::$db = new PDO(self::$dns, 
                                    self::$username, 
                                    self::$password, 
                                    self::$options);
            }
            catch(PDOException $e){
                $error_message = $e->getMessage();
                echo "<p>Lỗi kết nối: $error_message</p>";
                exit();
            }
        }
        return self::$db;
    }
    
    public static function close(){
        self::$db = null;
    }

    public static function execute_nonquery($sql, $option = array()) {
        self::getDB();
        if (self::$db != null) {
            try {
                $cmd = self::$db->prepare($sql);
                if (count($option) > 0) {
                    for ($i = 0; $i < count($option); $i++) {
                        $cmd->bindParam($i + 1, $option[$i]);
                    }
                }
                $cmd->execute();
                // Sửa đoạn này để trả về kết quả thích hợp cho trường hợp INSERT
                return self::$db->lastInsertId(); 
            } catch (PDOException $ex) {
                ShowError($ex);
            }
        } else {
            ShowError("Lỗi kết nối cơ sở dữ liệu");
        }
        self::disconnect();
    }
}

//Thực thi chuổi truy vấn
function db_query($query_string) {
    $conn = DATABASE::connect();
    $result = $conn->query($query_string);
    if (!$result) {
        db_sql_error('Query Error', $query_string);
    }
    return $result;
}


// Lấy một dòng trong CSDL
function db_fetch_row($query_string) {
    $conn = DATABASE::connect();
    $result = $conn->query($query_string);
    if (!$result) {
        db_sql_error('Query Error', $query_string);
    }
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row;
}

//Lấy một mảng trong CSDL
function db_fetch_array($query_string) {
    $conn = DATABASE::connect();
    $result = $conn->query($query_string);
    if (!$result) {
        db_sql_error('Query Error', $query_string);
    }
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

//Lấy số bản ghi
function db_num_rows($query_string) {
    $conn = DATABASE::connect();
    $result = $conn->query($query_string);
    if (!$result) {
        db_sql_error('Query Error', $query_string);
    }
    $num_rows = $result->rowCount();
    return $num_rows;
}


function escape_string($str) {
    global $conn; // Assuming $conn is your PDO connection

    if ($conn instanceof PDO) {
        return $conn->quote($str); // Use PDO quote method for escaping
    } elseif (is_object($conn) && $conn instanceof mysqli) {
        return mysqli_real_escape_string($conn, $str);
    } else {
    }
}

function db_update($table, $data, $where) {
    $conn = DATABASE::connect();
    $sql = "";
    foreach ($data as $field => $value) {
        if ($value === NULL) {
            $sql .= "$field=NULL, ";
        } elseif ($field === 'views') {
            // Check if $value is an empty string, and handle accordingly
            $value = ($value === '') ? 0 : $value;
            $sql .= "$field=" . (int)$value . ", ";
        } else {
            $sql .= "$field='" . escape_string($value) . "', ";
        }
    }
    $sql = substr($sql, 0, -2);
    
    // Use PDO's prepare and execute for the update query
    $stmt = $conn->prepare("UPDATE $table SET $sql WHERE $where");
    $stmt->execute();

    // Use PDO's rowCount method to get the affected rows
    $affectedRows = $stmt->rowCount();

    return $affectedRows;
}

function insert_bill_detail($data) {
    $conn = DATABASE::connect();

    // Columns to be inserted
    $columns = implode(', ', array_keys($data));

    // Named placeholders for values
    $placeholders = ':' . implode(', :', array_keys($data));

    // SQL query
    $sql = "INSERT INTO `bill_details` ($columns) VALUES ($placeholders)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        // Return the last inserted ID
        return $conn->lastInsertId();
    } catch (PDOException $ex) {
        ShowError($ex);
    }
}

if (!function_exists('escape_string')) {
    function escape_string($str) {
        global $conn; // Assuming $conn is your PDO or mysqli connection

        if ($conn instanceof PDO) {
            return $conn->quote($str); // Use PDO quote method for escaping
        } elseif (is_object($conn) && $conn instanceof mysqli) {
            return mysqli_real_escape_string($conn, $str);
        } else {
            // Handle other cases or throw an error
            // You might want to implement your own escaping logic here
            // Note: This assumes $conn is a valid PDO or mysqli connection
        }
    }
}

// Hiển thị lỗi SQL

function db_sql_error($message, $query_string = "") {
    global $conn;

    $sqlerror = "<table width='100%' border='1' cellpadding='0' cellspacing='0'>";
    $sqlerror.="<tr><th colspan='2'>{$message}</th></tr>";
    $sqlerror.=($query_string != "") ? "<tr><td nowrap> Query SQL</td><td nowrap>: " . $query_string . "</td></tr>\n" : "";
    $sqlerror.="<tr><td nowrap> Error Number</td><td nowrap>: " . mysqli_errno($conn) . " " . mysqli_error($conn) . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Date</td><td nowrap>: " . date("D, F j, Y H:i:s") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> IP</td><td>: " . getenv("REMOTE_ADDR") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Browser</td><td nowrap>: " . getenv("HTTP_USER_AGENT") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Script</td><td nowrap>: " . getenv("REQUEST_URI") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Referer</td><td nowrap>: " . getenv("HTTP_REFERER") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> PHP Version </td><td>: " . PHP_VERSION . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> OS</td><td>: " . PHP_OS . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Server</td><td>: " . getenv("SERVER_SOFTWARE") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Server Name</td><td>: " . getenv("SERVER_NAME") . "</td></tr>\n";
    $sqlerror.="</table>";
    $msgbox_messages = "<meta http-equiv=\"refresh\" content=\"9999\">\n<table class='smallgrey' cellspacing=1 cellpadding=0>" . $sqlerror . "</table>";
    echo $msgbox_messages;
    exit;
}
