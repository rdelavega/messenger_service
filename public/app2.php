<?php

    require_once "HTML/Template/ITX.php";

    function userView($line, $template)
    {
        $template->setVariable("TITLE", "Messenger");
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
