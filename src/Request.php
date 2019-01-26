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
     * Get POST data by key name
     *
     * @param string $key
     * @param null $default
     * @return null
     */
    public static function post(string $key, $default = null)
    {
        return $_POST[$key] ?? $default;
    }

    /**
     * Get GET data by key name
     *
     * @param string $key
     * @param null $default
     * @return null
     */
    public static function get(string $key, $default = null)
    {
        return $_GET[$key] ?? $default;
    }

    /**
     * Get Request date by key name
     *
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public static function request($key, $default = null)
    {
        return $_REQUEST[$key] ?? $default;
    }
}