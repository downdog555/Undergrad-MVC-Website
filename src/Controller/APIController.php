<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * API Controller
 *
 * 
 *
 * 
 */
class APIController extends AppController
{

    

    /**
    *   Method to verify a card
    *
    *
    *
    *
    **/
    public function verify($data)
    {
        //load required models for verification
       $this->loadModel('Stations');
        $this->loadModel('Cards');
        $this->loadModel('Accesslogs');

       try{
           $dataArray = explode("/", $data);
        $stationKey = $dataArray[0];
        $manufaturerData = $dataArray[1];
        $assignedData = $dataArray[2];
       }
       catch(Exception $e)
       {
            $response = $this->response->withStatus(404);
            return $response;
       }

        

        //we then check if the access level for that station is correct 
        //we check if it is valid station
        $query = $this->Stations
    ->find()
    ->where(['stationKey =' => $stationKey])->first();
        if(strlen($query) === 0)
        {
            $response = $this->response->withStatus(403);
            return $response;
        }
        else
        {
            //we then need to check if card is valid 
            $cardQuery = $this->Cards->find()->where(['manufacturedata ='=>$manufaturerData, 'assigneddata ='=>$assignedData])->first();
            if(strlen($cardQuery) == 0)
            {

                //$response = $this->response->withStatus(404);
                //return $response;
                $this->set('man', $manufaturerData);
                $this->set('ass', $assignedData);
                
            }
            else
            {
                //we then need to check if the access level is correct
                //if not pass 404
                if($cardQuery['access_level'] >= $query['accessLevelRequired'])
                {
                    //we need to insert a new record
                    $Accesslogs = TableRegistry::get('Accesslogs');
                    $log = $Accesslogs->newEntity();
                    $log->card_id = $cardQuery['id'];
                    $log->station_id = $query['id'];
                    $log->time_accessed = Time::now();
                    if ($Accesslogs->save($log)) {
     $response = $this->response->withStatus(200);
                    return $response;
   
}

                    $response = $this->response->withStatus(403);
                    return $response;
                }
                else
                {
                    $response = $this->response->withStatus(403);
                    //$this->set('accessCard', $cardQuery['access_level']);
                    //$this->set('accessStation', $query['accessLevelRequired']);
                    return $response;
                    
                }
            }

        }
    

        //if it is we can respond with 200

        //if its not 404 or 403

        $response = $this->response->withStatus(403);
                    //$this->set('accessCard', $cardQuery['access_level']);
                    //$this->set('accessStation', $query['accessLevelRequired']);
                    return $response;
        //$this->set('data', $cardQuery[0]);
        $this->set('queryData', $cardQuery);
    }
}
