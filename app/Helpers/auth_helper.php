<?php 
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function checkTokenHeader($request, $LoginModel){
    $key = getenv('TOKEN_SECRET');
    $header = $request->getServer('HTTP_AUTHORIZATION');
    if(!$header) return false;
    $token = explode(' ', $header)[1];

    try {
        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        $data = $LoginModel->getLoginToken($decoded->username, $token);
        if(!count($data)>0) return false;

        return $data;
    
    } catch (\Throwable $th) {
        return false;
    }
}

function checkToken($token, $LoginModel){
    $key = getenv('TOKEN_SECRET');
    try {
        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        $data = $LoginModel->getLoginToken($decoded->username, $token);
        if(!count($data)>0) return false;

        return $decoded;
    
    } catch (\Throwable $th) {
        return false;
    }
}
?>