<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stadium;
use App\Models\listTypeLocation;
use Illuminate\Support\Facades\DB;
class listTypeLocationController extends Controller
{
    public function index(){
        $data=DB::table('listTypeLocations as l')->select('l.id','l.stadium_id','l.description','s.name')->join('stadiums as s','s.id','=','l.stadium_id')->orderByDesc('l.created_at')->paginate(6);
        return view('listTypeLocation',["types"=>$data]);
    }
    public function loadeTypeLocation($id){
        $t=listTypeLocation::where('id','like',$id)->get()[0];
        $values=["id_stadium"=>$t->stadium_id,"description"=>$t->description,"id"=>$t->id];
        return view('FormLocationType',["Stadiums"=>Stadium::latest()->get(),"values"=>$values]);
    }
    public function deleteTypeLocation(Request $r,$id){
        $t=listTypeLocation::where('id','like',$id)->get()[0];
        $t->delete();
        $data=DB::table('listTypeLocations as l')->select('l.id','l.stadium_id','l.description','s.name')->join('stadiums as s','s.id','=','l.stadium_id')->orderByDesc('l.created_at')->paginate(6);
        return redirect()->route('listTypeLocation')->with(["type"=>"success","message"=>"Type Deleted with success !!"]);
    }
    public function FormLocationType(){
        
        return view('FormLocationType',["Stadiums"=>Stadium::latest()->get()]);

    }
    public function searchTypeLocation(Request $r){
        $stadium=$r->input('stadium');
        $description=$r->input('description');
        $data=DB::select("select 
        l.id,l.stadium_id,l.description,s.name 
        from stadiums s 
        inner join listTypeLocations l on s.id=l.stadium_id
        inner join listTypeLocations l1 on l1.stadium_id=l.stadium_id
        inner join stadiums s1 on s1.id=s.id
        where 
        l1.description like ? and s1.name like ?
        ",['%'.$description.'%','%'.$stadium.'%']);
        return view('listTypeLocation',["types"=>$data]);

    }
    public function addLocationType(Request $r){
    if($r->has('id')){
        
        $id_stadium=$r->input('id_stadium');
        $description=$r->input('description');
        $id=$r->input('id');

        if($id_stadium!="" && $description!=""){
          $c=listTypeLocation::where('stadium_id','like',$id_stadium)->where('description','like',$description)->where('id','not like',$id)->count();
          if($c==0){
    
            $t=listTypeLocation::where('id','like',$id)->get()[0];
            $t->stadium_id=$id_stadium;
            $t->description=$description;
            $t->save();
            return view('FormLocationType',[
                'type'=>"success",
                "message"=>"Updated With Success",
                "Stadiums"=>Stadium::latest()->get()
            ]);
          }else
          return view('FormLocationType',[
            'type'=>"error",
            "message"=>"this type is already exist !!",
            "Stadiums"=>Stadium::latest()->get()
    
        ])->with("values",$r->input());
    
        }else{
            return view('FormLocationType',[
                'type'=>"error",
                "message"=>"Please fill the whole form !!",
                "Stadiums"=>Stadium::latest()->get()
    
            ])->with("values",$r->input());
        }
    
    }else{
        $id_stadium=$r->input('id_stadium');
        $description=$r->input('description');
        if($id_stadium!="" && $description!=""){
          $c=listTypeLocation::where('stadium_id','like',$id_stadium)->where('description','like',$description)->count();
          if($c==0){
    
            $t=new listTypeLocation();
            $t->stadium_id=$id_stadium;
            $t->description=$description;
            $t->save();
            return view('FormLocationType',[
                'type'=>"success",
                "message"=>"Added With Success",
                "Stadiums"=>Stadium::latest()->get()
            ]);
          }else
          return view('FormLocationType',[
            'type'=>"error",
            "message"=>"this type is already exist !!",
            "Stadiums"=>Stadium::latest()->get()
    
        ])->with("values",$r->input());
    
        }else{
            return view('FormLocationType',[
                'type'=>"error",
                "message"=>"Please fill the whole form !!",
                "Stadiums"=>Stadium::latest()->get()
    
            ])->with("values",$r->input());
        }
    
    }
    }
}
