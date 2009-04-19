--TEST--
ext/sockets - socket_get_option - test for SO_DEBUG,SO_BROADCAST,SO_REUSEADDR,SO_SO_KEEPALIVE,SO_LINGER,SO_OOBINLINE,SO_SNDBUF,SO_RCVBUF
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

    socket_set_option($s_c, SOL_SOCKET, SO_DEBUG, 0);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_DEBUG);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_BROADCAST, 0);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_BROADCAST);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_BROADCAST, 1);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_BROADCAST);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_REUSEADDR, 0);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_REUSEADDR);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_REUSEADDR, 1);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_REUSEADDR);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_KEEPALIVE, 0);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_KEEPALIVE);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_KEEPALIVE, 1);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_KEEPALIVE);
    var_dump($s_g);
    
    $linger = array('l_linger' => 1, 'l_onoff' => 1);
    socket_set_option($s_c, SOL_SOCKET, SO_LINGER, $linger);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_LINGER);
    var_dump($s_g);
    
    $linger = array('l_linger' => 1, 'l_onoff' => 0);
    socket_set_option($s_c, SOL_SOCKET, SO_LINGER, $linger);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_LINGER);
    var_dump($s_g);
    
    $linger = array('l_linger' => 0, 'l_onoff' => 1);
    socket_set_option($s_c, SOL_SOCKET, SO_LINGER, $linger);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_LINGER);
    var_dump($s_g);
    
    $linger = array('l_linger' => 0, 'l_onoff' => 0);
    socket_set_option($s_c, SOL_SOCKET, SO_LINGER, $linger);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_LINGER);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_OOBINLINE, 0);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_OOBINLINE);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_OOBINLINE, 1);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_OOBINLINE);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_SNDBUF, 0);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_SNDBUF);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_SNDBUF, 1);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_SNDBUF);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_RCVBUF, 0);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_RCVBUF);
    var_dump($s_g);
    
    socket_set_option($s_c, SOL_SOCKET, SO_RCVBUF, 1);
    $s_g = socket_get_option($s_c, SOL_SOCKET, SO_RCVBUF);
    var_dump($s_g);
    
    socket_close($s_c);
?>
--EXPECT--
int(0)
int(0)
int(1)
int(0)
int(1)
int(0)
int(1)
array(2) {
  ["l_onoff"]=>
  int(1)
  ["l_linger"]=>
  int(1)
}
array(2) {
  ["l_onoff"]=>
  int(0)
  ["l_linger"]=>
  int(1)
}
array(2) {
  ["l_onoff"]=>
  int(1)
  ["l_linger"]=>
  int(0)
}
array(2) {
  ["l_onoff"]=>
  int(0)
  ["l_linger"]=>
  int(0)
}
int(0)
int(1)
int(2048)
int(2048)
int(256)
int(256)
