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
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

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

    /**
     * Check Ajax request
     *
     * @return bool
     */
    public static function isAjax(): bool
    {
        return strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest';
    }

    /**
     * Check Post request
     *
     * @return bool
     */
    public static function isPost(): bool
    {
        return strtoupper($_SERVER['REQUEST_METHOD'] ?? '') === self::METHOD_POST;
    }
}