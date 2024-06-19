<?php

namespace Tests\functional;

use App\Database\PdoDatabaseConnection;
use App\Database\PdoQueryBilder as DatabasePdoQueryBilder;
use App\Helpers\Config;
use App\Helpers\HttpClient;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;


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
        // echo $response->getBody();
        $this->assertEquals(200, $response->getStatusCode());


        $bug = $this->queryBilder->table('bugs')->where('name', 'API')->where('user', 'Ahmas')->first();
        $this->assertNotNull($bug);
        return $bug;
    }

    #[Depends('testItCanCreatDataWithAPI')]

    public function testItCanUpdateDataWhithAPI($bug)
    {
        $data = [
            'json' => [
                'id' => $bug->id,
                'name' => 'API For Update'

            ]
        ];
        $response = $this->httpClient->put('index.php', $data);
        $this->assertEquals(200, $response->getStatusCode());
        $bug = $this->queryBilder->table('bugs')->find($bug->id);
        $this->assertNotNull($bug);
        $this->assertEquals('API For Update', $bug->name);
    }

    #[Depends('testItCanCreatDataWithAPI')]

    public function testItcanfetchDatawhithAPI($bug)
    {
        $response = $this->httpClient->get('index.php', [
            'json' => [
                'id' => $bug->id
            ]

        ]);
        echo ($response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('id', json_decode($response->getBody(), true));
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
