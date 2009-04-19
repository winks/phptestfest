--TEST--
ext/sockets - socket_get_option - test for SO_TYPE,SO_DONTROUTE,SO_RCVLOWAT, SO_RCVTIMEO, SO_SNDTIMEO, SO_SNDLOWAT
--CREDITS--
Florian Anderiasch
fa@php.net
--SKIPIF--
<?php
    if (!extension_loaded('sockets')) {
        die('skip sockets extension not available.');
    }
?>
--FILE--
<?php
    $rand = rand(1,999);
    $s_c = socket_create_listen(31330+$rand);
   
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_ERROR);
    var_dump($s_g);

    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_TYPE);
    var_dump($s_g);

    socket_set_option($s_c, SOL_SOCKET, SO_DONTROUTE, 0);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_DONTROUTE);
    var_dump($s_g);

    socket_set_option($s_c, SOL_SOCKET, SO_DONTROUTE, 1);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_DONTROUTE);
    var_dump($s_g);

    socket_set_option($s_c, SOL_SOCKET, SO_RCVLOWAT, 0);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_RCVLOWAT);
    var_dump($s_g);

    socket_set_option($s_c, SOL_SOCKET, SO_RCVLOWAT, 1);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_RCVLOWAT);
    var_dump($s_g);

    socket_set_option($s_c, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 0, 'usec' => 0));
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_RCVTIMEO);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 1, 'usec' => 0));
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_RCVTIMEO);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 1, 'usec' => 1));
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_RCVTIMEO);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 0, 'usec' => 1));
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_RCVTIMEO);
    var_dump($s_g);

    socket_set_option($s_c, SOL_SOCKET, SO_SNDTIMEO, array('sec' => 0, 'usec' => 0));
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_SNDTIMEO);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_SNDTIMEO, array('sec' => 1, 'usec' => 0));
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_SNDTIMEO);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_SNDTIMEO, array('sec' => 1, 'usec' => 1));
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_SNDTIMEO);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_SNDTIMEO, array('sec' => 0, 'usec' => 1));
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_SNDTIMEO);
    var_dump($s_g);

    #socket_set_option($s_c, SOL_SOCKET, SO_SNDLOWAT, 0);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_SNDLOWAT);
    var_dump($s_g);
    
    #socket_set_option($s_c, SOL_SOCKET, SO_SNDLOWAT, 1);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_SNDLOWAT);
    var_dump($s_g);
    
    socket_close($s_c);
?>
--EXPECT--
int(0)
int(1)
int(0)
int(1)
int(1)
int(1)
array(2) {
  ["sec"]=>
  int(0)
  ["usec"]=>
  int(0)
}
array(2) {
  ["sec"]=>
  int(1)
  ["usec"]=>
  int(0)
}
array(2) {
  ["sec"]=>
  int(1)
  ["usec"]=>
  int(4000)
}
array(2) {
  ["sec"]=>
  int(0)
  ["usec"]=>
  int(4000)
}
array(2) {
  ["sec"]=>
  int(0)
  ["usec"]=>
  int(0)
}
array(2) {
  ["sec"]=>
  int(1)
  ["usec"]=>
  int(0)
}
array(2) {
  ["sec"]=>
  int(1)
  ["usec"]=>
  int(4000)
}
array(2) {
  ["sec"]=>
  int(0)
  ["usec"]=>
  int(4000)
}
int(1)
int(1)
