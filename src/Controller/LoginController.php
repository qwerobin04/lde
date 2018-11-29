<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Login Controller
 *
 * @property \App\Model\Table\LoginTable $Login
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // $login = $this->paginate($this->Login);
        //
        // $this->set(compact('login'));

    }

     function fb(){

                    session_start();

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "partreg";

                    // Create connection
                    $db = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($db->connect_error) {
                      die("Connection failed: " . $db->connect_error);
                    }

                    if ($db->connect_error){
                            die ('connect:' . $db->connect_error);
                          }

                          $fb = new Facebook\Facebook([
                            'app_id' => '200216560868481',
                            'app_secret' => '65345fe05510e8a6d353e48a9dd2c5ec',
                            'default_graph_version' => 'v3.2',
                            ]);

                          $helper = $fb->getRedirectLoginHelper();
                          $permissions = ['email'];

                          try {
                           if (isset($_SESSION['facebook_access_token'])) {
                             $accessToken = $_SESSION['facebook_access_token'];
                           } else {
                               $accessToken = $helper->getAccessToken();
                           }
                          } catch(Facebook\Exceptions\FacebookResponseException $e) {

                             echo 'Graph returned an error: ' . $e->getMessage();

                             exit;
                          } catch(Facebook\Exceptions\FacebookSDKException $e) {
                           echo 'Facebook SDK returned an error: ' . $e->getMessage();
                             exit;
                           }

                          if (isset($accessToken)) {
                           if (isset($_SESSION['facebook_access_token'])) {
                             $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
                           } else {
                             $_SESSION['facebook_access_token'] = (string) $accessToken;
                             $oAuth2Client = $fb->getOAuth2Client();

                             $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

                             $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;


                             $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
                           }

                           if (isset($_GET['code'])) {
                             header('Location: ./');
                           }

                           try {
                             $profile_request = $fb->get('me?fields=id,name');
                             $profile = $profile_request->getGraphNode()->asArray();
                           } catch(Facebook\Exceptions\FacebookResponseException $e) {

                             echo 'Graph returned an error: ' . $e->getMessage();
                             session_destroy();

                             header("Location: ./");
                             exit;
                           } catch(Facebook\Exceptions\FacebookSDKException $e) {

                             echo 'Facebook SDK returned an error: ' . $e->getMessage();
                             exit;
                           }
                           $name = $profile['name'];
                           $sql = "INSERT INTO login (name, token)
                            VALUES ('{$name}', '{$accessToken}')";

                           if ($db->query($sql) === TRUE) {

                           }
                           else {
                               echo "Error: " . $sql . "<br>" . $db->error;
                           }

                           $db->close();
                          } else {

                           $loginUrl = $helper->getLoginUrl('http://localhost/lde/', $permissions);
                           echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
                    }

    }
    public function loginpage() {
        $this->render('login');
      }

    /**
     * View method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $login = $this->Login->get($id, [
            'contain' => []
        ]);

        $this->set('login', $login);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $login = $this->Login->newEntity();
        if ($this->request->is('post')) {
            $login = $this->Login->patchEntity($login, $this->request->getData());
            if ($this->Login->save($login)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login could not be saved. Please, try again.'));
        }
        $this->set(compact('login'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $login = $this->Login->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $login = $this->Login->patchEntity($login, $this->request->getData());
            if ($this->Login->save($login)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login could not be saved. Please, try again.'));
        }
        $this->set(compact('login'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $login = $this->Login->get($id);
        if ($this->Login->delete($login)) {
            $this->Flash->success(__('The login has been deleted.'));
        } else {
            $this->Flash->error(__('The login could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
