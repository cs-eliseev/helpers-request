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
}