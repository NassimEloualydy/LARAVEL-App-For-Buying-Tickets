<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stadium;
use App\Models\listTypeLocation;
use App\Models\Location;
use Illuminate\Support\Facades\DB;


class locationController extends Controller
{
    public function index(){
     $data=DB::table('locations as l')->select('l.id','l.image','l.name_location','l.side_location','l.nbr_place_max','l.isSoldOut','l.type_location_id','lt.description','s.name')
     ->join('listtypelocations as lt','lt.id','=','l.type_location_id')
     ->join('stadiums as s','s.id','=','l.stadium_id')->paginate(6);
        return view('location',["locations"=>$data]);
    }
    public function loadLocation(Request $r,$id){
        $l=Location::where('id','like',$id)->get()[0];
        $s=Stadium::latest()->get();

        //return redirect()->route('FormLocation')->with(['values'=>$l]);
         return view('FormLocation',["Staduims"=>$s,'values'=>$l]);


    }
    public function deleteLocation(Request $r,$id){
        $l=Location::where('id','like',$id)->get()[0];
        if(file_exists($l->image))
        unlink($l->image);
        $l->delete();
        return redirect()->route('location')->with(['type'=>'success','message'=>'location deleted successfuly']);

    }
    public function FormLocation(){
        $s=Stadium::latest()->get();
        return view('FormLocation',["Staduims"=>$s]);
    }
    public function getTypeOfStudiumLocations(Request $r){
        $types=listTypeLocation::where('stadium_id','like',$r->input('id'))->get();
        $data="<option value=''>Choose A Type</option>";
        foreach($types as $t){
        $data.="<option value='".$t->id."'>".$t->description."</option>";
        }
        return $data;
    }
    public function submitLocation(Request $r){
                $s=Stadium::latest()->get();
        $name=$r->input('name');
        $stadium_id=$r->input('stadium_id');
        $type=$r->input('type');
        $side_location=$r->input('side_location');
        $nbr_place_max=$r->input('nbr_place_max');
        if($nbr_place_max<10)
                return view('FormLocation',[
            "Staduims"=>$s,
            "message"=>"please , the maximum number must be more then 10",
            "type"=>"error"
            ])->with("values",$r->input());        
        $c=Location::where('name_location','like',$name)->count();
        if($c!=0)
        return view('FormLocation',[
            "Staduims"=>$s,
            "message"=>"please the name is already exist !!",
            "type"=>"error"
            ])->with("values",$r->input());
        $img=$r->file('image');
        $ext=explode(".",$img->getClientOriginalName());
        $filename=$name.'.'.$ext[1];
        $r->file('image')->storeAs('locations',$filename,'public');
        $l=new Location();
        $l->stadium_id=$stadium_id;
        $l->type_location_id=$type;
        $l->side_location=$side_location;
        $l->nbr_place_max=$nbr_place_max;
        $l->image='storage/locations/'.$filename;
        $l->name_location=$name;
        $l->save();
        return view('FormLocation',[
            "Staduims"=>$s,
            "message"=>"location added with success",
            "type"=>"success"
        ]);
    }
}
