<?php

require_once(__DIR__."/config.php");

function read_binary($path) {
    $filesize = filesize($path);
    $fp = fopen($path, 'rb');
    $binary = fread($fp, $filesize);
    fclose($fp);
    return $binary;
}

function vigenere($char, $index) {
    global $CONFIG;
    $cipher = $CONFIG["vigenere_cipher"];
    $shift = $cipher[$index % sizeof($cipher)];

    return chr($char-$shift);
}

function read_passwords() {
    global $CONFIG;
    $passwords = [];
    $passwords_binary = read_binary($CONFIG["passwords_file"]);
    $lines = explode(chr(10), $passwords_binary);

    foreach ($lines as $line) {
        $bytearray = unpack('C*', $line);
        if (sizeof($bytearray)>0) {
            $data = explode("*", join(array_map('vigenere', $bytearray, range(0, sizeof($bytearray)-1))));
            $passwords[$data[0]] = $data[1];
        }
    }
    
    return $passwords;
}

$passwords = read_passwords();

function user_exists($email) {
    global $passwords;
    return array_key_exists($email, $passwords);
}

function authenticate($email, $password) {
    global $passwords;
    return (user_exists($email) and $password == $passwords[$email]);
}

function get_preffered_color($email) {
    global $CONFIG;
    
    $mysqli = new mysqli(
        $CONFIG["db"]["host"],
        $CONFIG["db"]["user"],
        $CONFIG["db"]["pw"],
        $CONFIG["db"]["database"]
    );
    
    if ($mysqli->connect_errno) {
        log_error("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $result = $mysqli->query("SELECT Titkos FROM tabla where username='".$email."'");
    $data = mysqli_fetch_array($result);
    $result->close();

    if (is_null($data)) {
        return Null;
    } else {
        return $data["Titkos"];
    }
}
