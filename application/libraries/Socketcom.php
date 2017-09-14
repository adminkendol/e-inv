<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Socketcom {
    public function socket(){
        $host = base_url();
        $port = 8040;
        set_time_limit(0);
        for (;;) {
            // create socket
            $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            // bind socket to port
            $result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
            // start listening for connections
            $result = socket_listen($socket, 3) or die("Could not set up socket listener\n");
            // accept incoming connections
            // spawn another socket to handle communication
            $spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
            // read client input
            $input = socket_read($spawn, 1024) or die("Could not read input\n");
            // clean up input string
            $input = trim($input);
            echo "Client Message : ".$input. "\n";
            // reverse client input and send back
            //$output = strrev($input) . "\n";
            $output = "SUCK ".$input . "\n";
            socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
            // close sockets
            socket_close($spawn);
            //socket_close($socket);
        }
    }
}
