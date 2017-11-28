SELECT name,
       m.id_conversation,
       message
FROM p_cu m
LEFT JOIN p_conversation c USING (id_conversation)
LEFT JOIN p_users u USING(id_user)
WHERE m.id_conversation IN
    (SELECT id_conversation
     FROM p_sessions
     LEFT JOIN p_participants USING(id_user)
     WHERE ipaddress = '189.216.199.227'
       AND status = 1)
ORDER BY mdate DESC;


SELECT id_conversation
FROM p_conversation c
LEFT JOIN p_cu m USING(id_conversation)
HAVING max(mdate);


SELECT name,
       lname,
       username,
       id_conversation
FROM p_conversation
LEFT JOIN p_participants USING(id_conversation)
LEFT JOIN p_users USING(id_user)
WHERE id_conversation IN
    (SELECT id_conversation
     FROM p_sessions
     LEFT JOIN p_participants USING(id_user)
     WHERE ipaddress = '189.216.199.227'
       AND status = 1
       AND id_user = 4)
  AND id_user <> 4;


SELECT name,
       lname,
       username
FROM p_conversation
LEFT JOIN p_participants USING(id_conversation)
LEFT JOIN p_users USING(id_user)
WHERE id_conversation = $conv_id
ORDER BY name;

