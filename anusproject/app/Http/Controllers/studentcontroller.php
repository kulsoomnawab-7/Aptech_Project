<?php

namespace App\Http\Controllers;
use App\Models\lab;
use App\Models\user;
use App\Models\usermodels;
use App\Models\lab_system;
use App\Models\complain__master;
use DB;                  
use Carbon\Carbon;                                                                           
use Illuminate\Http\Request;

class studentcontroller extends Controller
{
    public function registerget()
    {
        return view ("register");
    }

   
    public function loginadminpost(Request $req)
    {
        $email =$req->emailinput;
        $password= $req->passwordinput;

        $login =DB::table("usermodels")->where(["email"=>$email , "password"=>$password])->first();

        if($login!="")
        {
            session(["sessionid"=>$login->id]);
            session(["sessionusername"=>$login->name]);
            session(["sessionuseremail"=>$login->email]);     
            session()->get('Login_post') ;
            // echo $login->email;
            $student_data = DB::table('examsubjectmasters')->where('Curr_ID' , session('sessionid'))->orderBy('id','desc')->limit('1')->get();
            return view('student_dashboard',compact('student_data'));
          
        }

        else
        {
            return redirect()->back()->with("errormessage" , "Record Not Found");

        }
    }
    public function adminget()
    {
        return view("/login");
    }
   
    public function registerpost(Request $res)
    {
        $email =$res->emailinput;
        $studcheck =DB::table("students")->where("Student_email", $email)->first();
        // echo "nj".$studcheck;
        $pass =$res->passwordinput;

        if(strlen($pass) < 8)
        {
            echo "<script>alert('Woops! Password cannot be less the 8 characters.')
            window.location.href=''
            </script>";
            return;
            
        }
            
        else
        {
            if(isset($studcheck))
        {

        try{
            
        $user =DB::table("usermodels")->where("email", $email)->first();

            if(isset($user))
            {
                echo "<script>alert('Email Already Exists.')
                window.location.href='/register'
                </script>";
                // return redirect()->back()->with("success" , "Data has been inserted");

            }
            else{

                $pass =$res->passwordinput;
                $conpass =$res->coninput;
 
                if($pass == $conpass)
                {
                    $user = new usermodels();
                    $user->name = $res->nameinput;
                    $user->email = $res->emailinput;
                    $user->password = $res->passwordinput;
                    $user->save();
                }
                else{
                    // echo "<script>alert('Password Not Matched.')</script>";
                    echo "<script>alert('Password Not Matched.')
                    window.location.href=''
                    </script>";

                }
                
            }
        }
        catch(Exception $ex){


            echo $ex->getMessage();
            die;
        }
            echo "<script>alert('User Registration Completed.')
            window.location.href='/login'
            </script>";

        }

        }
    }

    public function dashboard_(Request $req)
    {
        // $studcheck =DB::table("students")->where("Student_email", $req->Auth::user()->email)->first();
        // echo  $studcheck;
        // return view("student_dashboard");
    }

    public function labs()
    {
        return view("labs");
    }
    public function lab_systems_()
    {
        return view("lab_systems");
    }

    public function lab()
    {
        $lab = new lab();
        $lab->No_of_pcs=$req->No_of_pcsinput;
        $lab->save();
        return redirect()->back();
    }

    public function lab_systems()
    {
        $lab = new lab_system();
        $lab->Host_Name=$req->Host_Nameinput;
        $lab->Status=$req->Statusinput;
        $lab->Lab_id=$req->Host_Nameinput;
        $lab->save();
        return redirect()->back();
    }
    public function exam_fetch(Request $req)
    {
        $examfetchall = Carbon::now();
        $examfetchall->toDateTimeString();

    if(session()->has('sessionid')){
        $exam = DB::table('examsubjectmasters')->where('Curr_ID' , session()->get('sessionid'))->orderBy('id','asc')->get();
        // $details = DB::join('examsubjectmasters','examsubjectmasters.Curr_ID','=','modulars.id')->get(["examsubjectmasters.*","modulars.*"]);

        $exam = DB::table('examsubjectmasters')->where('Curr_ID' , session()->get('sessionid'))->get();
        $fetchexam1 = DB::table('examsubjectmasters')->where('Sem_ID'  , '=',5)->get();
        $fetchexam2 = DB::table('examsubjectmasters')->where('Sem_ID'  , '=',4)->get();
        $fetchexam3 = DB::table('examsubjectmasters')->where('Sem_ID'  , '=',3)->get();
        $fetchexam4 = DB::table('examsubjectmasters')->where('Sem_ID'  , '=',2)->get();
        $fetchexam5 = DB::table('examsubjectmasters')->where('Sem_ID'  , '=',1)->get();
        return view('examfetch',compact('exam','fetchexam1','fetchexam2','fetchexam3','fetchexam4','fetchexam5'));
    }
        
    }

    
}
