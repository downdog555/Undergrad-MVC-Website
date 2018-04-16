<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CardsController;
use Cake\TestSuite\IntegrationTestCase;
use GuzzleHttp\Client;
/**
 * App\Controller\CardsController Test Case
 */
class CardsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cards',
        'app.employees',
        'app.accesslogs',
        'app.stations'
    ];


public function testUnauthenticatedFails()
{
    // No session data set.
    $this->get('/cards/index');

    $this->assertRedirect('/employees/login?redirect=%2Fcards%2Findex');
}





    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
             $client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://localhost/',
    // You can set any number of default request options.
    'timeout'  => 10,
]);





//print_r( $resp->getHeader('Set-Cookie'));
       $response = $client->request('POST', 'dissetation/employees/login', [
    'form_params' => [
        'password' => 'Test1',
        'username' => 'test@test.com'
        
    ]
]);



  
    $response = $client->request('GET', 'dissetation/cards');
 //$response = $client->send($request);
 $this->assertEquals(200, $response->getStatusCode());
 
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test viewEmployeeCard method
     *
     * @return void
     */
    public function testViewEmployeeCard()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
