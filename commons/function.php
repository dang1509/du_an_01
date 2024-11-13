<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

function uploadFile($file,$folderUpload){
    $path_storage = $folderUpload.time().$file['name'];
    $from = $file['tmp_name'];
    $to = PATH_ROOT.$path_storage;
    if(move_uploaded_file($from,$to)){
        return $path_storage;
    }
    return null;
}

function deleteFile($file){
    $path_delete = PATH_ROOT.$file;
    if(file_exists($path_delete)){
        unlink($path_delete);
    }
}

function deleteSessionError(){
    if(isset($_SESSION['flash'])){
        unset($_SESSION['flash']);
        session_unset();
        session_destroy();
    }
}