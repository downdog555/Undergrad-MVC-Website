<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EmployeesController;
use Cake\TestSuite\IntegrationTestCase;
use GuzzleHttp\Client;
/**
 * App\Controller\EmployeesController Test Case
 */
class EmployeesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employees',
        'app.cards',
        'app.accesslogs',
        'app.stations'
    ];

 


  public function setUp()
    {
        parent::setUp();

    }


public function testUnauthenticatedFails()
{
    // No session data set.
    $this->get('/employees/index');

    $this->assertRedirect('/employees/login?redirect=%2Femployees%2Findex');
}





    /**
     * Test logout method
     *
     * @return void
     */
    public function testLogout()
    {
        
 // create our http client (Guzzle)
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



  
    $response = $client->request('GET', 'dissetation/employees');
 //$response = $client->send($request);
 $this->assertEquals(200, $response->getStatusCode());
//means we are loggedin
 $response = $client->request('GET', 'dissetation/employees/logout');

 $responseNew = $client->request('GET', 'dissetation/employees');
// echo($responseNew->getStatusCode());
 //echo($responseNew->getBody());
 //$response = $client->send($request);
 $this->assertEquals(200, $responseNew->getStatusCode());
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
         //$this->enableCsrfToken();
    //$this->enableSecurityToken();

 // create our http client (Guzzle)
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



  
    $response = $client->request('GET', 'dissetation/employees');
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
     * Test login method
     *
     * @return void
     */
    public function testLogin()
    {
        
 // create our http client (Guzzle)
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



  
    $response = $client->request('GET', 'dissetation/employees');
 //$response = $client->send($request);
 $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Test search method
     *
     * @return void
     */
    public function testSearch()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test listincurrently method
     *
     * @return void
     */
    public function testListincurrently()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test viewCharts method
     *
     * @return void
     */
    public function testViewCharts()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
