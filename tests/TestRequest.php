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
}