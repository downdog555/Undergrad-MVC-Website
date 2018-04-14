<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[] paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
   public function initialize()
{
    parent::initialize();
     $this->Auth->allow(['logout']);

     
}


public function logout()
{
    $this->Flash->success('You are now logged out.');
    return $this->redirect($this->Auth->logout());
}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
        $this->set('_serialize', ['employees']);
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);

        $this->set('employeeView', $employee);
        $this->set('_serialize', ['employee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
        $this->set('_serialize', ['employee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeEdit = $this->Employees->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeEdit = $this->Employees->patchEntity($employeeEdit, $this->request->getData());
            if ($this->Employees->save($employeeEdit)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set('employeeEdit', $employeeEdit);
        $this->set('_serialize', ['employeeEdit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

/**
* Login Method
*
*
**/
     public function login()
    {
        if ($this->request->is('post'))
        {
        $employee = $this->Auth->identify();
            if ($employee) 
            {
                $this->Auth->setUser($employee);
                return $this->redirect(array('controller'=>'Employees','action'=>'view',$employee['id']));

            }
        $this->Flash->error('Your username or password is incorrect.');
        }
    }
    public function search($name = null)
    {
        //debug($query = $this->Employees->find()->select(['id', 'name', 'address', 'contactNumber'])->where(['name LIKE' => $name]));
        $query = $this->Employees->find()->select(['id', 'name', 'address', 'contactNumber'])->where(['name LIKE' => '%'.$name.'%']);

        $this->set('query', $query);

    }

    /**
        


    Function to list the people currently in building

    **/
    public function listincurrently()
    {
        $query = $this->Employees->find()->select(['id', 'name', 'address', 'contactNumber'])->where(['currentlyin' => '1']);
        $this->set('employeesInBuilding', $query);
    }



    /**

        Function to view the realted charts 

        $id is id of employee, or null by default

    **/
    public function viewCharts($id = null)
    {
         $employee = $this->Employees->get($id, [
            'contain' => []
        ]);

        $this->set('employeeView', $employee);
        $this->set('_serialize', ['employee']);

        $cardId  = $this->Cards->find()->where('employee_id'=>$employee['id']);
        //we need method to compare entries, order by the date and time, 
        $dataForAll = $this->Accesslogs-find()->where('card_id' => $cardId)->order(['time_accessed']);
        //for this data set, go through make pairs and get the time differnece between
        //have variables for each month add that to it
        //then load into next file
        //we need to set different data for each graph 
        //total hours worked, per month, per week, for past year
        //
    }
}
