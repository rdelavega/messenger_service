<?php
    function userView($line, $template)
    {
        include './php/user_list.php';
        include './php/conversation.php';

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
            $template->setVariable("TYPE", "ADMINISTRADOR");

            userList($line, $template);
        } elseif ($line['type'] == "user") {
            ///////////////
            // View USER //
            ///////////////

            $template->setVariable("TYPE", "USUARIO");

            conversation($line, $template);
        }

        $template->parseCurrentBlock();
    }
