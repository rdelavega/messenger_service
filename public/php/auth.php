<?php

    function getIpAddress()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }

    function auth($username, $password, $x)
    {
        include './php/config.php';

        $link = mysqli_connect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die('Could not connect: ' . mysqli_error($link));

        mysqli_select_db($link, $cfgServer['dbname']) or die("Could not select database");

        $ipaddress = getIpAddress();

        if ($x == 0) {
            $query = "SELECT id_user, name, lname, lname2, type, username, photo, password FROM p_users WHERE username = '$username'";

            $result = mysqli_query($link, $query) or die("Query 1 failed");

            $line = mysqli_fetch_assoc($result);

            if ($password != $line['password']) {
                die("Incorrect password");
            }
        } elseif ($x == 1) {
            $query = "SELECT id_user, name, lname, lname2, type, username, photo, password FROM p_sessions LEFT JOIN p_users USING(id_user) WHERE ipaddress = '$ipaddress' AND status = 1";

            $result = mysqli_query($link, $query) or die("Query 1 failed");

            $line = mysqli_fetch_assoc($result);
        } else {
            $line = null;
        }

        if ($line != null) {
            $id_user = $line['id_user'];
            $query = "SELECT id_session FROM p_sessions WHERE id_user = $id_user";

            $result = mysqli_query($link, $query) or die("Query 1 failed");

            $session_data = mysqli_fetch_assoc($result);

            $id_session = $session_data['id_session'];

            $cdate = date('Y/m/d h:i:s');

            if ($session_data == null) {
                $query = "INSERT INTO p_sessions(ipaddress,id_user,sdate,status) VALUES ('$ipaddress',$id_user,'$cdate',1)";
            } else {
                $query = "UPDATE p_sessions SET ipaddress = '$ipaddress', status = 1, sdate = '$cdate', id_user = $id_user WHERE id_session = $id_session";
            }

            $result = mysqli_query($link, $query) or die("Query 1 failed");
        }

        mysqli_free_result($result);

        @mysqli_close($link);

        return $line;
    }
