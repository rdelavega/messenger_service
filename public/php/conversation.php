<?php

  function conversation($line, $template)
  {
      include './php/config.php';

      $link = mysqli_connect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die('Could not connect: ' . mysqli_error($link));

      mysqli_select_db($link, $cfgServer['dbname']) or die("Could not select database");

      $id_user = $line['id_user'];
      $ipaddress = getIpAddress();

      $query = "SELECT DISTINCT id_conversation FROM p_sessions LEFT JOIN p_participants USING(id_user) WHERE ipaddress = '$ipaddress' AND status = 1 AND id_user = $id_user";

      $result = mysqli_query($link, $query) or die("Query 1 failed");

      $pila = array();

      while ($list = mysqli_fetch_assoc($result)) {
          $conv_id = $list['id_conversation'];

          $query2 = "SELECT * FROM p_cu LEFT JOIN p_conversation USING(id_conversation) WHERE id_conversation = $conv_id ORDER BY mdate LIMIT 1";

          $result2 = mysqli_query($link, $query2) or die("Query 1 failed");

          $txt = mysqli_fetch_assoc($result2);

          $query2 = "SELECT id_user, name, lname, username FROM p_conversation LEFT JOIN p_participants USING(id_conversation) LEFT JOIN p_users USING(id_user) WHERE id_conversation = $conv_id ORDER BY name";

          $result2 = mysqli_query($link, $query2) or die("Query 1 failed");

          $str = "Yo";

          while ($people = mysqli_fetch_assoc($result2)) {
              if ($people['id_user'] != $id_user) {
                  $str = $str.", ".$people['name'];
              }
              if ($people['id_user'] == $txt['id_user']) {
                  if ($people['id_user'] == $id_user) {
                      $author = "Yo";
                  } else {
                      $author = $people['name'];
                  }
              }
          }

          $array = array(
            "name" => $str,
            "photo" => "images/person.svg",
            "conv" => $conv_id,
            "message" => $txt['message'],
            "author" => $author
        );

          array_push($pila, $array);
      }

      $template->addBlockfile("LIST", "CONV", "conversation.html");

      $template->setCurrentBlock("USERLIST");

      for ($i=0; $i < count($pila); $i++) {
          $template->setCurrentBlock("CONV_I");

          $template->setVariable("PEOPLE_I", truncate($pila[$i]["name"], 40));
          $template->setVariable("PHOTO_I", "images/person.svg");
          $template->setVariable("MESSAGE_I", truncate($pila[$i]["author"].": ".$pila[$i]["message"], 70));

          $template->parseCurrentBlock("CONV_I");
      }

      $template->parseCurrentBlock("CONV");

      mysqli_free_result($result);

      mysqli_free_result($result2);

      @mysqli_close($link);
  }
