<?php
    require_once "HTML/Template/ITX.php";
    include 'http://antares.dci.uia.mx/ic15rvb/messenger_service/public/php';
    include './config.php';
    include './app2.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $template = new HTML_Template_ITX('./templates');
    $template->loadTemplatefile("base.html", true, true);

    $link = mysqli_connect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die('Could not connect: ' . mysqli_error($link));

    mysqli_select_db($link, $cfgServer['dbname']) or die("Could not select database");



    $result = mysqli_query($link, $query) or die("Query 1 failed");

    $line = mysqli_fetch_assoc($result);

    if ($line == null) {
        die("Error en los datos");
    } else {
        $template->setVariable("TITLE", "Mensajeria");
        $template->addBlockfile("WRAPPER", "USER", "user.html");

        $template->setCurrentBlock("USER");
        $template->setVariable("NAME", $line['name']);

        if ($line['lname2'] == null) {
            $lname = $line['lname'];
        } else {
            $lname = $line['lname']." ".$line['lname2'];
        }

        $template->setVariable("LNAME", $lname);
        $template->setVariable("USERNAME", $line['username']);

        if ($line['photo'] != false) {
            $template->setVariable("IMAGE", "image[".$line['id_user']."]");
        } else {
            $template->setVariable("IMAGE", "images/person.svg");
        }

        if ($line['type'] == "admin") {
            ////////////////
            // View ADMON //
            ////////////////
            $template->addBlockfile("LIST", "USERLIST", "user_list.html");

            $template->setCurrentBlock("USERLIST");

            $template->setVariable("TYPE", "ADMINISTRADOR");
        } elseif ($line['type'] == "user") {
            ///////////////
            // View USER //
            ///////////////

            $template->setVariable("TYPE", "USUARIO");
        }

        $template->parseCurrentBlock();
    }

    mysqli_free_result($result);

    @mysqli_close($link);

    $template->show();
