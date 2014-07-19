<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SessionsController
 *
 * @author michaelghattas
 */
class SessionsController extends BaseController{
    //put your code here
    
    public function create(){
        if (Auth::check()) {
            return Redirect::to('/admin');
        }
        return View::make('sessions.create');
    }
    
    public function destroy(){
        Auth::logout();
        return Redirect::route('sessions.create');
    }
    
    public function store(){
        if(Auth::attempt(Input::only('email','password'))){
            return Redirect::to('/admin');
        }else{
            return Redirect::back()->withInput();
        }
    }
    
}
