<?php 

function onlyNumbers(string $value): string {
    return preg_replace( '/[^0-9]/is', '', $value );
}