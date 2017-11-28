<?php

  function userList($line, $template)
  {
      include './php/config.php';

      $link = mysqli_connect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die('Could not connect: ' . mysqli_error($link));

      mysqli_select_db($link, $cfgServer['dbname']) or die("Could not select database");

      $query = "SELECT id_user, name, lname, lname2, username, photo FROM p_users WHERE type <> 'admin' ORDER BY lname";

      $result = mysqli_query($link, $query) or die("Query 1 failed");

      $template->addBlockfile("LIST", "USERLIST", "user_list.html");

      $template->setCurrentBlock("USERLIST");

      while ($list = mysqli_fetch_assoc($result)) {
          if ($list['lname2'] == null) {
              $lname = $list['lname'];
          } else {
              $lname = $list['lname']." ".$list['lname2'];
          }

          $template->setCurrentBlock("USER_I");

          if ($list['photo'] != false) {
              $template->setVariable("PHOTO_U", "image[".$list['id_user']."]");
          } else {
              $template->setVariable("PHOTO_U", "images/person.svg");
          }

          $template->setVariable("NAME_U", $list['name']);
          $template->setVariable("LNAME_U", $lname);
          $template->setVariable("TYPE_U", "CLIENTE");
          $template->setVariable("UNAME_U", $list['username']);

          $template->parseCurrentBlock("USER_I");
      }

      $template->parseCurrentBlock("USERLIST");

      mysqli_free_result($result);

      @mysqli_close($link);
  }
