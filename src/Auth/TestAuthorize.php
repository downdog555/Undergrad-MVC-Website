<?php
namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Http\ServerRequest;
use App\Model\Entity\Employee;

class TestAuthorize extends BaseAuthorize
{
    public function authorize($employee, ServerRequest $request)
    {
        $employee = (object)$employee;
        // assume false
        $authorized = false;

        // admins see everything, return immediately
        if ($employee->jobType == 'admin') {
            return true;
        }

        switch($request->getParam('controller')) {
            case 'Employees':
                // check the action param to control for a specific controller action
                if ($request->getParam('action') == 'logout') {
                    $authorized = true; // everyone can log out
                }
                elseif($request->getParam('action') == 'add')
                {
                	$authorized = true;
                }
                elseif($request->getParam('action') == 'index')
                {
                	if($employee->jobType != 'admin')
                	{
                		$authorized = false;
                	}
                	else
                	{
                		$authorized = true;
                	}
                }
                elseif($request->getParam('action') == 'view')
                {
                    
                	if($employee->id == $request->getParam('pass')[0])
                	{
                		$authorized = true;
                	}

                	
                }
                elseif($request->getParam('action') == 'edit')
                {
                	if($employee->id == $request->getParam('pass')[0])
                	{
                		$authorized = true;
                	}
                	
                }
                elseif($request->getParam('action') == 'viewCharts')
                {
                    if($employee->id == $request->getParam('pass')[0])
                    {
                        $authorized = true;
                    }
                }
                else
                {
                	$authorized = false;
                }
                break;
            case 'API':
            		if ($request->getParam('action') == 'verify') {
                    $authorized = true; // we dont have a specific key or login scheme for the stations
                }
            break;

            case 'Cards':
            	if($request->getParam('action') == 'view')
            	{
            		
            	}
            	else
            	{
            		$authorized = false;
            	}
            break;

            case 'Accesslogs':

            $authorized = false;

            break;
                
            default: 
                if (!empty($user)) {
                    $authorized = false;
                }
                break;
        }

        return $authorized;
    }
    }


?>