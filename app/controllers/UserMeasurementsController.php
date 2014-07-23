<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class UserMeasurementsController extends BaseController {

    protected $user, $userMeasurements, $usersHasSizes;
    private  $measurementType;

    public function __construct(User $user, UserMeasurements $userMeasurements, UsersHasSizes $usersHasSizes) {
        $this->userMeasurements = $userMeasurements;
        $this->user = $user;
        $this->usersHasSizes = $usersHasSizes;
        
        $this->garments = DB::table('garments')->orderBy('id', 'asc')->lists('garment','id');
        $this->brands = DB::table('brands')->orderBy('id', 'asc')->lists('brand','id');
        $this->regions = DB::table('regions')->orderBy('id', 'asc')->lists('region','id');
        $this->demographics = DB::table('demographics')->orderBy('id', 'asc')->lists('demographic','id');
        $this->letterSizes = DB::table('letterSizes')->orderBy('id', 'asc')->lists('letterSize','id');
        $this->measurementType = DB::table('measurementType')->orderBy('id', 'asc')->lists('type','id');
    }
    
    public function index ($userid){
        
        $userSizes = DB::table('users_has_sizes')->where('users_id', $userid)->get();
        return View::make('usermeasurements.index',['userSizes' => $userSizes]);   
    }
    
    public function create($userid){
        $userMeasurements = $this->userMeasurements->find($userid);
        return View::make('usermeasurements.create',['userid' =>$userid, 'userMeasurements' => $userMeasurements,'garments'=>$this->garments,'brands' => $this->brands, 'regions' => $this->regions, 'demographics' => $this->demographics
                , 'letterSizes' => $this->letterSizes, 'measurementType' => $this->measurementType]);
    }
    
    public function store($userid){
  
        $size = DB::table('sizes')->where('garments_id','=',Input::get('garments_id'))->where('brands_id', '=', Input::get('brands_id'),'AND')->where('regions_id', '=', Input::get('regions_id'),'AND')->where('demographics_id', '=', Input::get('demographics_id'),'AND')->where('letterSizes_id', '=', Input::get('letterSizes_id'),'AND')->get();
        
        if(count($size) == 0 && $userid === NULL)
            return Redirect::back();
        
        $userHasSizes = new UsersHasSizes;
        
        $userHasSizes->users_id = $userid;
        $userHasSizes->sizes_id = $size[0]->id;
        
        $userHasSizes->save();

        Return Redirect::action('users.sizes.index', $userid);
        
        /*$userMeasurements = Input::all();
        if(!$this->userMeasurements->fill($userMeasurements)->isValid()){
            
            return Redirect::back()->withInput()->withErrors($this->userMeasurements->errors);
            
        }*/
        
        /*$userMeasurement = new UserMeasurements;
        
        $measurement->measurementType_id = Input::get('measurementType_id');
        $measurement->sizes_id = $sizeid;
        $measurement->cm = Input::get('cm');
        $measurement->inch = Input::get('inch');
        $measurement->eu = Input::get('eu');
        $measurement->us = Input::get('us');
        
        $measurement->save();*/
        
        //Return Redirect::action('sizes.measurements.index', $sizeid);
    }
    /*
    public function show($userid,$userMeasurementsid){
        $measurement = $this->userMeasurements->find($userMeasurementsid);
        return View::make('measurements.show',['measurement' => $measurement, 'measurementType' => $this->measurementType]);
    }
    
    public function edit($userid,$userMeasurementsid){
        $measurement = $this->userMeasurements->find($measurementid);
        return View::make('measurements.edit',['measurement' => $measurement, 'measurementType' => $this->measurementType]);
    }
    
    public function update($userid,$userMeasurementsid){
        
        $input = Input::all();
        if(! $this->userMeasurements->fill($input)->isValid()){
            return Redirect::back()->withInput()->withErrors($this->measurement->errors);
        }
        
        $measurement = $this->userMeasurements->find($measurementid);
        
        $measurement->measurementType_id = Input::get('measurementType_id');
        $measurement->cm = Input::get('cm');
        $measurement->inch = Input::get('inch');
        $measurement->eu = Input::get('eu');
        $measurement->us = Input::get('us');
        
        $measurement->save();
        
        Return Redirect::action('sizes.measurements.index', $sizeid);
        
    }
    
    public function destroy($userid,$userMeasurementsid){
       
        $measurement = $this->userMeasurements->find($measurementid);
        $measurement->delete();
        
        Return Redirect::action('sizes.measurements.index', $sizeid);
    }*/

    public function match($id){
        return View::make('usermeasurements.match',['userid' => $id, 'garments' => $this->garments,'brands' => $this->brands, 'regions' => $this->regions, 'demographics' => $this->demographics
                , 'letterSizes' => $this->letterSizes, 'measurementType' => $this->measurementType]);
    }
    
    public function report($id){
        
        $favoriteSize = DB::table('sizes')->where('garments_id','=',Input::get('garments_id'))->where('brands_id', '=', Input::get('brands_id'),'AND')->where('regions_id', '=', Input::get('regions_id'),'AND')->where('demographics_id', '=', Input::get('demographics_id'),'AND')->where('letterSizes_id', '=', Input::get('letterSizes_id'),'AND')->get();
        $matches = DB::table('sizes')->where('garments_id','=',Input::get('garments_id'))->where('brands_id', '=', Input::get('match_brands_id'),'AND')->where('regions_id', '=', Input::get('match_regions_id'),'AND')->where('demographics_id', '=', Input::get('demographics_id'),'AND')->get();
                
        if(count($favoriteSize) == 0 || count($matches) == 0)
            return "Size or match does not exist";
        
        //USE size[0]->id because in test phase
        $favMeasTypes = DB::table('measurements')->where('sizes_id', $favoriteSize[0]->id)->get();
        
        $nbOfSizeMeasurements = count($favMeasTypes);
        
        foreach ($matches as $match){
            
            $matchMeas = DB::table('measurements')->where('sizes_id', $match->id)->get();
            $recommendedSize = 0;
            $count = 0;
            $matchCount = 0;
            
            foreach($favMeasTypes as $favMeasType){
                
                if($favMeasType->cm == $matchMeas[$count]->cm){
                    $matchCount++;
                }
                
                $count++;
                
            }
            
            if($matchCount == $nbOfSizeMeasurements){
                $recommendedSize = $match->letterSizes_id;
                break;
            }
            
        }
        
        return View::make('usermeasurements.report', ['favMeas'=>$favMeasTypes, 'matchMeasTypes'=>$matchMeas,'recommendedSize'=>$recommendedSize,
            'letterSizes' => $this->letterSizes, 'garments' => $this->garments,'brands' => $this->brands, 'brands_id' => Input::get('match_brands_id'),
            'garments_id' => Input::get('garments_id'),'regions_id' => Input::get('match_regions_id'),'regions' => $this->regions]);
    }
    
}

