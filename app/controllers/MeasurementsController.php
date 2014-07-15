<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MeasurementsController
 *
 * @author michaelghattas
 */

class MeasurementsController extends BaseController {

    protected $measurement, $size;
    private  $measurementType;

    public function __construct(Measurement $measurement, Size $size) {
        $this->measurement = $measurement;
        $this->size = $size;
        
        $this->measurementType = DB::table('measurementType')->orderBy('id', 'asc')->lists('type','id');
    }
    
    public function index ($sizeid){
        
        $measurements = $this->measurement->where('sizes_id', $sizeid)->get();
        return View::make('measurements.index',['measurements' => $measurements]);
    }
    
    public function create($sizeid){
        $size = $this->size->find($sizeid);
        return View::make('measurements.create',['measurementType' => $this->measurementType, 'size' => $size]);
    }
    
    public function store($sizeid){
        
        $measurement = Input::all();
        if(!$this->measurement->fill($measurement)->isValid()){
            
            return Redirect::back()->withInput()->withErrors($this->measurement->errors);
            
        }
        
        $measurement = new Measurement;
        
        $measurement->measurementType_id = Input::get('measurementType_id');
        $measurement->sizes_id = $sizeid;
        $measurement->cm = Input::get('cm');
        $measurement->inch = Input::get('inch');
        $measurement->eu = Input::get('eu');
        $measurement->us = Input::get('us');
        
        $measurement->save();
        
        Return Redirect::action('sizes.measurements.index', $sizeid);
    }
    
    public function show($sizeid,$measurementid){
        $measurement = $this->measurement->find($measurementid);
        return View::make('measurements.show',['measurement' => $measurement, 'measurementType' => $this->measurementType]);
    }
    
    public function edit($sizeid,$measurementid){
        $measurement = $this->measurement->find($measurementid);
        return View::make('measurements.edit',['measurement' => $measurement, 'measurementType' => $this->measurementType]);
    }
    
    public function update($sizeid,$measurementid){
        
        $input = Input::all();
        if(! $this->measurement->fill($input)->isValid()){
            return Redirect::back()->withInput()->withErrors($this->measurement->errors);
        }
        
        $measurement = $this->measurement->find($measurementid);
        
        $measurement->measurementType_id = Input::get('measurementType_id');
        $measurement->cm = Input::get('cm');
        $measurement->inch = Input::get('inch');
        $measurement->eu = Input::get('eu');
        $measurement->us = Input::get('us');
        
        $measurement->save();
        
        Return Redirect::action('sizes.measurements.index', $sizeid);
        
    }
    
    public function destroy($sizeid,$measurementid){
       
        $measurement = $this->measurement->find($measurementid);
        $measurement->delete();
        
        Return Redirect::action('sizes.measurements.index', $sizeid);
    }

}