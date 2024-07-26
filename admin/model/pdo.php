<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'wzang');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection() {
    $dburl = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $username = DB_USER;
    $password = DB_PASSWORD;

    try {
        $conn = new PDO($dburl, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;
    } catch(PDOException $e) {
        // Xử lý ngoại lệ ở đây hoặc cho hàm gọi xử lý
        return null; // hoặc có thể trả về một giá trị khác để thông báo lỗi
    }
}


/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql, $args = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);

        // Kiểm tra nếu $args không phải là mảng, chuyển đổi nó thành mảng
        if (!is_array($args)) {
            $args = [$args];
        }

        $stmt->execute($args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        $conn = null;
    }
}

/**
 * Thực thi câu lệnh sql thao tác dữ liệu và trả về lastInsertId
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return string lastInsertId
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute_return_lastInsertId($sql, $args = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $conn->lastInsertId();
    } catch(PDOException $e) {
        throw $e;
    } finally {
        $conn = null;
    }
}

/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql, $args = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        $conn = null;
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql, $args = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        
        // Kiểm tra nếu $args không phải là mảng, chuyển đổi nó thành mảng
        if (!is_array($args)) {
            $args = [$args];
        }

        $stmt->execute($args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
} catch (PDOException $e) {
        throw $e;
    } finally {
        $conn = null;
    }
}



/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql, $args = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($row) ? array_values($row)[0] : null;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        $conn = null;
    }
}
