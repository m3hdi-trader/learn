<?php

namespace Tests\functional;

use App\Database\PdoDatabaseConnection;
use App\Database\PdoQueryBilder as DatabasePdoQueryBilder;
use App\Helpers\Config;
use App\Helpers\HttpClient;
use PHPUnit\Framework\TestCase;

class CrudTest extends TestCase

{
    private $httpClient;
    private $queryBilder;


    public function setUp(): void
    {
        $pdoConnection = new PdoDatabaseConnection($this->getConfig());
        $this->queryBilder = new DatabasePdoQueryBilder($pdoConnection->connect());
        $this->httpClient = new HttpClient;
        parent::setUp();
    }

    public function testItCanCreatDataWithAPI()
    {
        $data = [
            'json' => [
                'name' => 'API',
                'user' => "Ahmas",
                'email' => 'api@gmail.com',
                'link' => 'api.com'
            ]
        ];
        $response = $this->httpClient->post('index.php', $data);
        echo $response->getBody();
        $this->assertEquals(200, $response->getStatusCode());


        $bug = $this->queryBilder->table('bugs')->where('name', 'API')->where('user', 'Ahmas')->first();
        $this->assertNotNull($bug);
    }

    public function tearDown(): void

    {
        $this->httpClient = null;
        parent::tearDown();
    }

    private function getConfig()
    {
        return $config = Config::get("database", "pdo_testing");
    }
}
