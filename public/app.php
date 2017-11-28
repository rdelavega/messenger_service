<?php

    include './php/app2.php';
    include './php/auth.php';
    require_once "HTML/Template/ITX.php";

    $template = new HTML_Template_ITX('./templates');
    $template->loadTemplatefile("base.html", true, true);

    $username = "";
    $password = "";

    if ($_POST['username'] != null && $_POST['password'] != null) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $line = auth($username, $password, 0);
    } else {
        $line = auth($username, $password, 1);
    }

    if ($line == null) {
        ///////////
        // LogIn //
        ///////////

        $template->setVariable("TITLE", "Bienvenido!!");
        $template->addBlockfile("WRAPPER", "LOGIN", "login.html");

        $template->setCurrentBlock("LOGIN");
        $template->touchBlock('LOGIN');
    } else {
        userView($line, $template);
    }

    $template->show();

    function truncate($string, $limit, $pad="...")
    {
        if (strlen($string) <= $limit) {
            return $string;
        }
        $breakpoint = $limit;
        if ($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint) . $pad;
        }
        return $string;
    }
