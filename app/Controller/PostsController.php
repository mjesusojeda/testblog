<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class PostsController extends AppController {
	public $helpers = array('Html','Form', 'Session');
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
			'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
		)
	);

	public function beforeFilter() {
		
		//$this->Auth->allow('index', 'view');
	}
	
	public function index(){
		$this -> set('posts', $this->Post->find('all'));
	}
	
	public function view($id = null){
		$this -> Post -> id = $id;
		$this -> set('post', $this->Post->read());
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('Your post has been saved.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	public function edit($id = null){
		$this -> Post -> id = $id;
		if($this -> request -> is('get')){
			$this -> request -> data = $this->Post->read();
		}
		else{
			if($this -> Post -> save($this -> request -> data)){
				$this -> Session -> setFlash('Tu post ha sido actualizado');
				$this -> redirect(array('action' => 'index'));
			}
			else{
				$this -> Session -> setFlash('No se ha podido actualizar tu post');
			}
		}
	}
	
	public function delete($id){
		if($this -> request -> is('get')){
			throw new MethodNotAllowedException();
		}
		if($this -> Post -> delete($id)){
			$this -> Session -> setFlash('Tu post con id: '.$id.' ha sido actualizado');
			$this -> redirect(array('action' => 'index'));
		}
	}

}
