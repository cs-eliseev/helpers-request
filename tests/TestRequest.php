<?php

use cse\helpers\Request;
use PHPUnit\Framework\TestCase;

class TestRequest extends TestCase
{
    /**
     * @param string $key
     * @param null|string $default
     * @param string $value
     * @param bool $set
     * @param $expected
     *
     * @dataProvider providerRequest
     */
    public function testPost(string $key, ?string $default, ?string $value, bool $set, $expected): void
    {
        if ($set) {
            $_POST[$key] = $value;
        } else {
            unset($_POST[$key]);
        }

        $this->assertEquals($expected, Request::post($key, $default));
    }

    /**
     * @param string $key
     * @param null|string $default
     * @param null|string $value
     * @param bool $set
     * @param $expected
     *
     * @dataProvider providerRequest
     */
    public function testGet(string $key, ?string $default, ?string $value, bool $set, $expected): void
    {
        if ($set) {
            $_GET[$key] = $value;
        } else {
            unset($_GET[$key]);
        }
        $this->assertEquals($expected, Request::get($key, $default));
    }

    /**
     * @param string $key
     * @param $default
     * @param $value
     * @param bool $set
     * @param $expected
     *
     * @dataProvider providerRequest
     */
    public function testRequests(string $key, $default, $value, bool $set, $expected): void
    {
        if ($set) {
            $_REQUEST[$key] = $value;
        } else {
            unset($_REQUEST[$key]);
        }
        $this->assertEquals($expected, Request::request($key, $default));
    }

    /**
     * @return array
     */
    public function providerRequest(): array
    {
        return [
            [
                'test',
                null,
                '12345',
                true,
                '12345',
            ],
            [
                'test2',
                '12345',
                null,
                true,
                '12345',
            ],
        ];
    }

    /**
     * @param bool $is_ajax
     * @param bool $expected
     *
     * @dataProvider providerIsAjax
     */
    public function testIsAjax(bool $is_ajax, bool $expected)
    {
        if ($is_ajax) {
            $_SERVER['HTTP_X_REQUESTED_WITH'] = 'xmlhttprequest';
        } else {
            unset($_SERVER['HTTP_X_REQUESTED_WITH']);
        }
        $this->assertEquals($expected, Request::isAjax());
    }

    /**
     * @return array
     */
    public function providerIsAjax(): array
    {
        return [
            [
                true,
                true,
            ],
            [
                false,
                false,
            ],
        ];
    }

    /**
     * @param string $method
     * @param bool $expected
     *
     * @dataProvider providerIsPost
     */
    public function testIsPost(string $method, bool $expected)
    {
        $_SERVER['REQUEST_METHOD'] = $method;
        $this->assertEquals($expected, Request::isPost());
    }

    /**
     * @return array
     */
    public function providerIsPost(): array
    {
        return [
            [
                Request::METHOD_GET,
                false,
            ],
            [
                Request::METHOD_POST,
                true,
            ],
            [
                Request::METHOD_DELETE,
                false,
            ],
        ];
    }

    /**
     * @param string $method
     * @param bool $expected
     *
     * @dataProvider providerIsGet
     */
    public function testIsGet(string $method, bool $expected): void
    {
        $_SERVER['REQUEST_METHOD'] = $method;
        $this->assertEquals($expected, Request::isGet());
    }

    /**
     * @return array
     */
    public function providerIsGet(): array
    {
        return [
            [
                Request::METHOD_GET,
                true,
            ],
            [
                Request::METHOD_POST,
                false,
            ],
            [
                Request::METHOD_DELETE,
                false,
            ],
        ];
    }

    /**
     * @param null|string $data
     * @param bool $is_ajax
     * @param null|string $default
     * @param string $expected
     *
     * @dataProvider providerGetRequestUri
     */
    public function testGetRequestUri(?string $data, bool $is_ajax, ?string $default, string $expected)
    {
        if ($is_ajax) {
            unset($_SERVER['HTTP_REFERER']);

            $_SERVER['HTTP_X_REQUESTED_WITH'] = 'xmlhttprequest';
            $_SERVER['REQUEST_URI'] = $data;
        } else {
            unset($_SERVER['HTTP_X_REQUESTED_WITH']);
            unset($_SERVER['REQUEST_URI']);

            $_SERVER['HTTP_REFERER'] = $data;
        }
        $this->assertEquals($expected, Request::getRequestUri($default));
    }

    /**
     * @return array
     */
    public function providerGetRequestUri(): array
    {
        return [
            [
                '/link/test',
                true,
                null,
                '/link/test',
            ],
            [
                '/link/test',
                false,
                null,
                '/link/test',
            ],
            [
                null,
                false,
                '/link/home',
                '/link/home',
            ],
        ];
    }

    /**
     * @param string $method
     * @param bool $expected
     *
     * @dataProvider providerIsRedirectedToHttps
     */
    public function testIsRedirectedToHttps(string $url, bool $expected): void
    {
        $this->assertEquals($expected, Request::isRedirectedToHttps($url));
    }

    /**
     * @return array
     */
    public function providerIsRedirectedToHttps(): array
    {
        return [
            [
                'http://google.com',
                true,
            ]
        ];
    }
}