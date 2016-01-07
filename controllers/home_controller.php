<?php
require_once('classes/Controller.class.php');

class HomeController extends Controller
{
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function home($params = null)
    {
        if (!$this->client->isMember()) {
            $this->client->notaMember = true;
        }
        $this->client->setHomeTemplates(array('nonmember', 'home'));
        $this->client->setHomeScripts(array('dialog'));
        $this->client->setstyle('home');
        if(isset($params['page_error']))
        $this->client->setPageError($params['page_error']);
    }

    public function post()
    {
        if (!$this->client->isMember()) {
            $this->client->redirect($this->client->getLink('home', 'home'));
        }
        $this->client->home='post';
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $targetid=null;
            switch($_POST['target']){
                case 'hood';
                    $targetid=$this->client->getHoodID();
                    break;
                case 'block';
                    $targetid=$this->client->blockid;
                    break;
            }
            if($this->client->createThread($_POST['title'],$_POST['body'],$_POST['target'],$targetid))
            $this->redirect($this->client->getLink('home','thread',array('tr'=>DB::select("select tid as id from message where mid=last_insert_id()")[0]['id'])));
        }

    }
    public function thread($params){
        $this->client->home='thread';
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->client->replytothread($_GET['tr'],$_POST['reply'])){
                $this->redirect($this->client->getLink('home','thread',array('tr'=>$_GET['tr'])));
            }
        }

    }
    public function search(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->client->search=true;
        }
    }
}

?>