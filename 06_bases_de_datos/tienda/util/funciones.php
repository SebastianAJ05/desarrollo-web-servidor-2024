<?php
    function sanear($campo){
        $campo = htmlentities($campo);
        $campo = trim($campo);
        $campo = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $campo);
        return $campo;
    }
?>