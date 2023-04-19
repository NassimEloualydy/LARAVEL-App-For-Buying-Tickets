<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Mail\WlcomeEmail;
use Illuminate\Support\Facades\Mail;
class AccountController extends Controller
{
  public function logOut(){
    
    $session=session();
    $session->forget(['image','first_name','last_name','email','pw','id_cart','phone','idAdmin','id']);
    $session->flush();
    Mail::to('nassimesofian@gmail.com')->send(new WlcomeEmail("Log out with success see you next time "));

    return view('index',[
      'msgLogOut'=>"Log out with success see you next time "
    ]);
  }
    public function index(){
        return view('SignIn');
    }
    public function LogIn(){
        return view('Login');
    }
    public function loginSubmit(Request $r){

      $c=Account::where('email','like',$r->input('email'))->where('pw','like',$r->input('pw'))->count();
            if($c==1){
                $c=Account::where('email','like',$r->input('email'))->where('pw','like',$r->input('pw'))->get();
                 session(["image"=>$c[0]->image]);              
                 session(["first_name"=>$c[0]->first_name]);              
                 session(["last_name"=>$c[0]->last_name]);              
                 session(["email"=>$c[0]->email]);              
                 session(["pw"=>$c[0]->pw]);              
                 session(["id_cart"=>$c[0]->id_cart]);              
                 session(["phone"=>$c[0]->phone]);              
                 session(["isAdmin"=>$c[0]->isAdmin]);              
                 session(["id"=>$c[0]->id]);              
                // $user = User::find(1); // Replace with your user object
                  ini_set('SMTP', 'smtp.gmail.com');
                  ini_set('smtp_port', 587);
                  ini_set('username', 'nassimesofian@gmail.com');
                  ini_set('password', 'npuybijzveehqzpf');
                 Mail::to('nassimesofian@gmail.com')->send(new WlcomeEmail("Login with success"));
                 return view('Login',['type'=>'success','message'=>"Log in with success "]);
            }else{
              return view('Login',['type'=>'error','message'=>"Please , the email and password aren't correct !!"])->with("values",$r->input());    
            }

    }
    public function signInSubmit(Request $r){
         $c=Account::where('id_cart','like',$r->input('id_cart'))->count();
         if($c!=0)
           return view('SignIn',['type'=>'error','message'=>'Please the id cart is already exist !!'])->with("values",$r->input());
         $c=Account::where('first_name','like',$r->input('first_name'))->where('last_name','like',$r->input('last_name'))->count();
         if($c!=0)
           return view('SignIn',['type'=>'error','message'=>'Please the first name and the last name is already exist !!'])->with("values",$r->input());
         $c=Account::where('email','like',$r->input('email'))->count();
         if($c!=0)
           return view('SignIn',['type'=>'error','message'=>'Please the email is already exist !!'])->with("values",$r->input());      
         $c=Account::where('phone','like',$r->input('phone'))->count();
         if($c!=0)
           return view('SignIn',['type'=>'error','message'=>'Please the phone is already exist !!'])->with("values",$r->input());            
           $c=Account::where('pw','like',$r->input('pw'))->count();
         if($c!=0)
           return view('SignIn',['type'=>'error','message'=>'Please the password is already exist !!'])->with("values",$r->input());      
           $img=$r->file('image');
           $ext=explode('.',$img->getClientOriginalName());
           $filename=$r->input('id_cart').'.'.$ext[1];
           $r->file('image')->storeAs('Accounts',$filename,'public');
           $a=new Account();
           $a->image='storage/Accounts/'.$filename;
           $a->first_name=$r->input('first_name');
           $a->last_name=$r->input('last_name');
           $a->email=$r->input('email');
           $a->pw=$r->input('pw');
           $a->id_cart=$r->input('id_cart');
           $a->phone=$r->input('phone');
           $a->save();           
           return view('SignIn',['type'=>'success','message'=>'Sign in with success']);            
        
    }

}
