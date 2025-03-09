<?php
// 데이터베이스 연결 정보
$servername = "211.238.133.10";
$username = "root";
$password = "@slsksh33@";
$dbname = "siri";

// MySQL 연결
function db_connect()
{
    global $servername, $username, $password, $dbname;
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("DB 연결 실패: " . mysqli_connect_error());
    }

    // ✅ MySQL 연결 문자셋을 UTF-8로 설정
    mysqli_set_charset($conn, "utf8mb4");

    return $conn;
}

// 🔹 SELECT 함수
function select($query)
{
    $conn = db_connect();
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("쿼리 오류: " . mysqli_error($conn));
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    mysqli_close($conn);
    return $data;
}

// 🔹 INSERT 함수 (배열 기반)
function insert($table, $data)
{
    $conn = db_connect();

    // 컬럼과 값 추출
    $columns = array_keys($data);
    $values = array_values($data);

    // 값 안전하게 처리
    $escaped_values = array_map(function ($value) use ($conn) {
        return "'" . mysqli_real_escape_string($conn, $value) . "'";
    }, $values);

    // SQL 쿼리 생성
    $query = "INSERT INTO `$table` (`" . implode("`, `", $columns) . "`) 
              VALUES (" . implode(", ", $escaped_values) . ")";

    // 쿼리 실행
    if (mysqli_query($conn, $query)) {
        $insert_id = mysqli_insert_id($conn); // 삽입된 ID 반환
        mysqli_close($conn);
        return $insert_id;
    } else {
        die("INSERT 오류: " . mysqli_error($conn));
    }
}


// 🔹 UPDATE 함수 (배열 기반)
function update($table, $data, $where)
{
    $conn = db_connect();

    // SET 절 생성
    $set_parts = [];
    foreach ($data as $column => $value) {
        $escaped_value = mysqli_real_escape_string($conn, $value);
        $set_parts[] = "`$column` = '$escaped_value'";
    }
    $set_clause = implode(", ", $set_parts);

    // WHERE 절 생성
    $where_parts = [];
    foreach ($where as $column => $value) {
        $escaped_value = mysqli_real_escape_string($conn, $value);
        $where_parts[] = "`$column` = '$escaped_value'";
    }
    $where_clause = implode(" AND ", $where_parts);

    // SQL 조합
    $query = "UPDATE `$table` SET $set_clause WHERE $where_clause";

    // 쿼리 실행
    if (mysqli_query($conn, $query)) {
        $affected_rows = mysqli_affected_rows($conn); // 변경된 행 개수 반환
        mysqli_close($conn);
        return $affected_rows;
    } else {
        die("UPDATE 오류: " . mysqli_error($conn));
    }
}

// 🔹 DELETE 함수
function delete($query)
{
    $conn = db_connect();
    if (mysqli_query($conn, $query)) {
        $affected_rows = mysqli_affected_rows($conn);
        mysqli_close($conn);
        return $affected_rows;
    } else {
        die("DELETE 오류: " . mysqli_error($conn));
    }
}
