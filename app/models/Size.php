<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Size extends Eloquent{
    protected $table = 'sizes';
    
    protected $fillable = ['garments_id', 'brands_id', 'regions_id', 'demographics_id', 'letterSizes_id'];
    
    public $errors;
    
    public static $rules = [
      'garments_id'=>'required|numeric', 'brands_id' => 'required|numeric', 'regions_id' => 'required|numeric'
        ,'demographics_id'=>'required|numeric', 'letterSizes_id' =>'required|numeric'
    ];
    
    public function measurements()
    {
        return $this->hasMany('Measurement');
    }
    
    public function isValid(){
            $validation = Validator::make($this->attributes, static::$rules);
            
            if($validation->passes()){
                return true;
            }
            
            $this->errors = $validation->messages();
            return false;
            
        }
        

    
}
