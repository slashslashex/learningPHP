<?php


function checkImageName(string $name) : bool
{
    return preg_match('/.*\.jpg$/', $name);
}