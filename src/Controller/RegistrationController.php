<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Registration Controller
 *
 * @property \App\Model\Table\RegistrationTable $Registration
 *
 * @method \App\Model\Entity\Registration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegistrationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $registration = $this->paginate($this->Registration);

        $this->set(compact('registration'));
    }

    /**
     * View method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registration = $this->Registration->get($id, [
            'contain' => []
        ]);

        $this->set('registration', $registration);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $registration = $this->Registration->newEntity();
        if ($this->request->is('post')) {
            $registration = $this->Registration->patchEntity($registration, $this->request->getData());
            if ($this->Registration->save($registration)) {
                $this->Flash->success(__('The registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registration could not be saved. Please, try again.'));
        }
        $this->set(compact('registration'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registration = $this->Registration->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registration = $this->Registration->patchEntity($registration, $this->request->getData());
            if ($this->Registration->save($registration)) {
                $this->Flash->success(__('The registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registration could not be saved. Please, try again.'));
        }
        $this->set(compact('registration'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registration = $this->Registration->get($id);
        if ($this->Registration->delete($registration)) {
            $this->Flash->success(__('The registration has been deleted.'));
        } else {
            $this->Flash->error(__('The registration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function regform(){

    }

    var $validate = array(
      'BusinessName' => array(
        'This Textbox should not be blanked' => array(
          'rule' => 'notEmpty',
          'message' => 'This is empty!'
        ),
        'This is already registered' => array(
          'rule' => 'isUnique',
          'message' => 'This is already registered'
        )
      ),

      'BusinessAddress' => array(
        'This Textbox should not be blanked' => array(
          'rule' => 'notEmpty',
          'message' => 'This is empty!'
        )
        ),

        'ContactNumber' => array(
          'This Textbox should not be blanked' => array(
            'rule' => 'notEmpty',
            'message' => 'This is empty!'
          )
          ),

        'EmailAddress'=> array(
          'This Textbox should not be blanked' => array(
            'rule' => 'notEmpty',
            'message' => 'This is empty!'
          )
          ),
          'This is already registered' => array(
            'rule' => 'isUnique',
            'message' => 'This is already registered'
          ),

    );

}
