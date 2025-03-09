<?php
// 🔹 쿠키 저장 함수
function set_cookie($name, $value, $days = 30)
{
    $expire = time() + (86400 * $days); // 기본 30일 동안 유지
    setcookie($name, $value, $expire, "/"); // "/"는 모든 페이지에서 접근 가능하도록 설정
}

// 🔹 쿠키 조회 함수
function get_cookie($name)
{
    return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
}

// 🔹 쿠키 삭제 함수
function delete_cookie($name)
{
    setcookie($name, "", time() - 3600, "/"); // 만료 시간을 과거로 설정하여 삭제
}
