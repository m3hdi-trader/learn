<?php

namespace Tests\Unit;

use App\Exceptions\ConfigFileNotFoundException;
use App\Helpers\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testGetFileContentReturnsArray()
    {
        $config = Config::getFileContents('database');
        $this->assertIsArray($config);
    }

    public function testItThrowExceptionIfFileNotFound()
    {
        $this->expectException(ConfigFileNotFoundException::class);
        $config = Config::getFileContents('mehdi');
    }
    public function testGetMethodReturnValidData()
    {
        $config = Config::get('database', 'pdo');
        $expectedData = [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'bug_traker',
            'username' => 'root',
            'password' => ''
        ];
        $this->assertEquals($config, $expectedData);
    }
}
