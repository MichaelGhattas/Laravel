<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author michaelghattas
 */
class UsersController extends BaseController {
    protected $user;
    
    public function __construct(User $user) {
        $this->user = $user;
    }
    
    public function index (){
        $users = $this->user->all();
        return View::make('users.index',['users' => $users]);
    }
    
    public function create(){
        return View::make('users.create');
    }
    
    public function store(){
        
        $input = Input::all();
        
        if(! $this->user->fill($input)->isInsertValid()){
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }
        
        $user = new User;
        
        $user->firstName = Input::get('firstName');
        $user->secondName = Input::get('secondName');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        
        Return Redirect::route('users.index');
    }
    
    public function show($id){
        $user = $this->user->find($id);
        return View::make('users.show',['user' => $user]);
    }
    
    public function edit($id){
        $user = $this->user->find($id);
        return View::make('users.edit',['user' => $user]);
    }
    
    public function update($id){
        $input = Input::all();
        
        if(! $this->user->fill($input)->isUpdateValid()){
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }
        
        $user = $this->user->find($id);
        
        $user->firstName = Input::get('firstName');
        $user->secondName = Input::get('secondName');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        
        Return Redirect::route('users.index');
        
    }
    
    public function destroy($id){
        $user = $this->user->find($id);
        $user->delete();
        
        Return Redirect::route('users.index');
    }
 }
