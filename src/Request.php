<?php

declare(strict_types=1);

namespace cse\helpers;

/**
 * Class Request
 *
 * @package cse\helpers
 */
class Request
{
    /**
     * Post
     *
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public static function post($key, $default = null)
    {
        return $_POST[$key] ?? $default;
    }
}