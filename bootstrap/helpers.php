<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/10/15
 * Time: 17:12
 * Email: jackying009@gmail.com
 * Copyright (c) Guangzhou Zhishen Data Service co,. Ltd
 */

function route_class()
{
    return str_replace('.', '-', \Illuminate\Support\Facades\Route::currentRouteName());
}

function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return str_limit($excerpt, $length);
}