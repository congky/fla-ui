<?php

function authTask(...$task) {

    $token = \Session::get("token");

    \Log::debug($token);

    return true;
}