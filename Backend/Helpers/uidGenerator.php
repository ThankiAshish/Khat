<?php
    function uid(int $length = 64) { 
        $length = ($length < 4) ? 4 : $length;
        return bin2hex(random_bytes(($length-($length%2))/2));
    }
?>