<?php
namespace App\Test\TestCase\Controller;

use App\Controller\APIController;
use Cake\TestSuite\IntegrationTestCase;
use GuzzleHttp\Client;

/**
 * App\Controller\APIController Test Case
 */
class APIControllerTest extends IntegrationTestCase
{

 
    /**
     * Test verify method
     *
     * @return void
     */
    public function testVerifyCorrectData()
    {

   // $this->enableCsrfToken();
    //$this->enableSecurityToken();


    // create our http client (Guzzle)
  $client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://localhost/',
    // You can set any number of default request options.
    'timeout'  => 10,
]);
    $response = $client->request('GET', 'dissetation/verify/test/MTkxNDIxMTM0MTAA/UT9EIjxN1Yg=');
 //$response = $client->send($request);
 $this->assertEquals(200, $response->getStatusCode());
       //$this->get('dissetation/verify/test/MTkxNDIxMTM0MTAA/UT9EIjxN1Yg=');
        //file_put_contents('H:/filename.txt', print_r($this, true));
        //$this->assertResponseNotEmpty() ;
        //$this->assertResponseCode(200);
    }


    public function testVerifyIncorrectDataShouldFail()
    {

    $this->enableCsrfToken();
    $this->enableSecurityToken();
        $result = $this->get('dissetation/verify/test/123213/1232131');
        $this->assertResponseError();
    }
}
