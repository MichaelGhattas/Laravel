<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SizesController
 *
 * @author michaelghattas
 */

class SizesController extends BaseController {

    protected $size;
    private $garments, $brands, $regions, $demographics, $letterSizes, $measurementType;

    public function __construct(Size $size) {
        $this->size = $size;
        
        $this->garments = DB::table('garments')->orderBy('id', 'asc')->lists('garment','id');
        $this->brands = DB::table('brands')->orderBy('id', 'asc')->lists('brand','id');
        $this->regions = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');
        $this->demographics = DB::table('demographics')->orderBy('id', 'asc')->lists('demographic','id');
        $this->letterSizes = DB::table('letterSizes')->orderBy('id', 'asc')->lists('letterSize','id');
        $this->measurementType = DB::table('measurementType')->orderBy('id', 'asc')->lists('type','id');
    }
    
    public function index (){
        $sizes = $this->size->all();
        return View::make('sizes.index',['sizes' => $sizes]);
    }
    
    public function create(){
        
        return View::make('sizes.create',['garments'=>$this->garments,'brands' => $this->brands, 'regions' => $this->regions, 'demographics' => $this->demographics
                , 'letterSizes' => $this->letterSizes, 'measurementType' => $this->measurementType]);
    }
    
    public function store(){
        
        //$size = Input::except('measurementType_id','cm','inches','eu','us');
        //$measurement = Input::except('garments_id','brands_id','regions_id','demographics_id','letterSizes_id');
        
        /*if(!$this->size->fill($size)->isValid() && !$this->measurement->fill($measurement)->isValid()){
            
            $errors = array_merge(($this->size->errors->toArray()), ($this->measurement->errors->toArray()));;
            return $errors;
            return Redirect::back()->withInput()->withErrors($errors);
            
        }  else  if(!$this->size->fill($size)->isValid()){
            
            return $this->size->errors;
            return Redirect::back()->withInput()->withErrors($this->size->errors);
            
        } else if(!$this->measurement->fill($measurement)->isValid()){
            
            return Redirect::back()->withInput()->withErrors($this->measurement->errors);
            
        }*/
        
        $size = Input::all();
        if(!$this->size->fill($size)->isValid()){
            
            return $this->size->errors;
            return Redirect::back()->withInput()->withErrors($this->size->errors);
            
        }
        
        $size = new Size;
        
        $size->garments_id = Input::get('garments_id');
        $size->brands_id = Input::get('brands_id');
        $size->regions_id = Input::get('regions_id');
        $size->demographics_id = Input::get('demographics_id');
        $size->letterSizes_id = Input::get('letterSizes_id');
        
        $size->save();
        
        /*$measurements = new Measurement;
        
        $measurement->measurementType_id = Input::get('measurementType_id');
        $measurement->size_id = Input::get('size_id');
        $measurement->cm = Input::get('cm');
        $measurement->inches = Input::get('inches');
        $measurement->eu = Input::get('eu');
        $measurement->us = Input::get('us');
        
        $measurement->save();*/
        
        Return Redirect::route('sizes.index');
    }
    
    public function show($id){
        $size = $this->size->find($id);
        return View::make('sizes.show',['size' => $size, 'garments'=>$this->garments,'brands' => $this->brands, 'regions' => $this->regions, 'demographics' => $this->demographics
                , 'letterSizes' => $this->letterSizes, 'measurementType' => $this->measurementType]);
    }
    
    public function edit($id){
        $size = $this->size->find($id);
        return View::make('sizes.edit',['size' => $size, 'garments'=>$this->garments,'brands' => $this->brands, 'regions' => $this->regions, 'demographics' => $this->demographics
                , 'letterSizes' => $this->letterSizes, 'measurementType' => $this->measurementType]);
    }
    
    public function update($id){
        $input = Input::all();
        if(! $this->size->fill($input)->isValid()){
            return Redirect::back()->withInput()->withErrors($this->size->errors);
        }
        
        $size = $this->size->find($id);
        
        $size->garments_id = Input::get('garments_id');
        $size->brands_id = Input::get('brands_id');
        $size->regions_id = Input::get('regions_id');
        $size->demographics_id = Input::get('demographics_id');
        $size->letterSizes_id = Input::get('letterSizes_id');
        
        $size->save();
        
        Return Redirect::route('sizes.index');
        
    }
    
    public function destroy($id){
        $size = $this->size->find($id);
        $size->delete();
        
        Return Redirect::route('sizes.index');
    }

}