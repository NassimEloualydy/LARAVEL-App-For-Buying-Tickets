<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stadium;
use Illuminate\Support\Facades\DB;

class StadiumController extends Controller
{

    public function index(){

        return view('Stadium',["Stadiums"=>Stadium::latest()->paginate(6)]);
    }
    public function searchStad(Request $r){
      $data=DB::select("select s.* from stadiums s 
      inner join stadiums s1 on s1.id=s.id
      inner join stadiums s2 on s2.id=s.id
      inner join stadiums s3 on s3.id=s.id
      inner join stadiums s4 on s4.id=s.id
      inner join stadiums s5 on s5.id=s.id
      where 
      s1.name like ? and  s2.contry like ? and s3.city like ? and s4.adresse like ?
      and s5.barcode like ?
      order by s.id desc
      ", [
        '%'.$r->input('name').'%',
        '%'.$r->input('contry').'%',
        '%'.$r->input('city').'%',
        '%'.$r->input('adresse').'%',
        '%'.$r->input('barcode').'%'
      ]);
      return view('Stadium',["Stadiums"=>$data])->with("values",$r->input());
      // ::latest()->paginate(6)
      // return view('Stadium',["Stadiums"=>Stadium::latest()->paginate(6)]);


    }
    public function FormStaduim(){
        return view('FormStaduim');
    }
    public function loadStadium(Request $r,$id){
      $s=Stadium::where('id','like',$id)->get();
      return view('FormStaduim',
      ['values'=>$s[0]]);      

    }
    public function deleteStadium(Request $r,$id){
      $s=Stadium::where('id','like',$id)->get();
      if(file_exists($s[0]->image))
      unlink($s[0]->image);
      $s[0]->delete();
      //  return view('Stadium',);
      return redirect()->route('Stadium')->with(['type'=>'success','message'=>'Stadium deleted with success']);

    }
    public function submitStaduim(Request $r){
        if($r->has('id')){
            //update the stad
            $c=Stadium::where('barcode','like',$r->input('barcode'))->where('id','not like',$r->input('id'))->count();
            if($c!=0)
            return view('FormStaduim',[
              'type'=>'error',
              'message'=>'please the barcode is already exist !!'
            ])->with("values",$r->input());
            $c=Stadium::where('name','like',$r->input('name'))->where('id','not like',$r->input('id'))->count();
            if($c!=0)
            return view('FormStaduim',[
              'type'=>'error',
              'message'=>'please the name is already exist !!'
            ])->with("values",$r->input());
            $s=Stadium::where('id','like',$r->input('id'))->get();
            if($r->has('image')){
              //delete the image 
              if(file_exists($s[0]->image))
              unlink($s[0]->image);
//              uploade the new file 
              $img=$r->file('image');
              $ext=explode('.',$img->getClientOriginalName());
              $filname=$r->input('barcode').'.'.$ext[1];
              $r->file('image')->storeAs('Stadiums',$filname,'public');

            }
            $s[0]->name=$r->input('name');
            $s[0]->city=$r->input('city');
            $s[0]->adresse=$r->input('adresse');
            $s[0]->barcode=$r->input('barcode');
            $s[0]->contry=$r->input('contry');
            $s[0]->save();
            return view('FormStaduim',[
              'type'=>'success',
              'message'=>'Stadium Updated with success '
            ]);
 
        }else{        
          //add the stad    
    $c=Stadium::where('barcode','like',$r->input('barcode'))->count();
    if($c!=0)
    return view('FormStaduim',[
      'type'=>'error',
      'message'=>'please the barcode is already exist !!'
    ])->with("values",$r->input());
    $c=Stadium::where('name','like',$r->input('name'))->count();
    if($c!=0)
    return view('FormStaduim',[
      'type'=>'error',
      'message'=>'please the name is already exist !!'
    ])->with("values",$r->input());
    $img=$r->file('image');
    $ext=explode('.',$img->getClientOriginalName());
    $filname=$r->input('barcode').'.'.$ext[1];
    $r->file('image')->storeAs('Stadiums',$filname,'public');
    $s=new Stadium();
    $s->image='storage/Stadiums/'.$filname;
    $s->name=$r->input('name');
    $s->city=$r->input('city');
    $s->adresse=$r->input('adresse');
    $s->barcode=$r->input('barcode');
    $s->contry=$r->input('contry');
    $s->save();
    return view('FormStaduim',[
      'type'=>'success',
      'message'=>'Stadium Added with success '
    ]);

  
        
       }
    }
}
