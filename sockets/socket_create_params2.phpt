--TEST--
ext/sockets - socket_create - test with wrong parameters
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
    $s_w = socket_create(1337, SOCK_STREAM, SOL_TCP);
    $s_w = socket_create(AF_INET, 1337, SOL_TCP);
    $s_w = socket_create(AF_INET, SOCK_STREAM, 1337);
?>
--EXPECTF--

Warning: socket_create(): invalid socket domain [1337] specified for argument 1, assuming AF_INET in %s on line %i

Warning: socket_create(): invalid socket type [1337] specified for argument 2, assuming SOCK_STREAM in %s on line %i

Warning: socket_create(): Unable to create socket [93]: Protocol not supported in %s on line %i
