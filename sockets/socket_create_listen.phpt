--TEST--
ext/sockets - socket_create_listen - basic test
--CREDITS--
Florian Anderiasch
fa@php.net
--SKIPIF--
<?php
    if (!extension_loaded('sockets')) {
        die('skip - sockets extension not available.');
    }
?>
--FILE--
<?php
    $rand = rand(1,999);
    // wrong parameter count
#    $s_c_l = socket_create_listen();
#    var_dump($s_c_l);
#    if (isset($s_c_l)) socket_close($s_c_l);
    // default invocation
    $s_c_l = socket_create_listen(31330+$rand);
    var_dump($s_c_l);
    socket_close($s_c_l);
?>
--EXPECTF--
resource(%i) of type (Socket)
