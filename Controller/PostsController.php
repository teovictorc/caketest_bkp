<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP PostsController
 * @author Téo Victor
 */
class PostsController extends AppController {
    public $name = 'Posts';

    public function index() {
        $conditions = $this->postConditions($this->request->data, array('title'=> 'LIKE'));
        $posts = $this->Post->find('all', compact('conditions'));
        $this->set('posts', $posts);
    }

    public function view($id = null) {
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());
    }
    
    public function add(){
        if($this->request->is('post')){
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash('Sua postagem foi salva com sucesso.');
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function edit($id = null){
        $this->Post->id = $id;
        if($this->request->is('get')){
            $this->request->data = $this->Post->read();
        }else{
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash('Os dados foram atualizados com sucesso.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    public function delete($id){
        if(!$this->request->is('post')){
            throw new MethodNotAllowedException();
        }
        
        if($this->Post->delete($id)){
            $this->Session->setFlash("A postagem com a id: {$id} foi deletada com sucesso.");
            $this->redirect(array("action" => "index"));
        }
    }
}
