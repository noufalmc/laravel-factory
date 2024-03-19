<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\standard;

class StudentController extends Controller
{
    public function save(Request $request)
    {

        $rules =['fname' => 'required|string|max:120',
                 'lname' => 'required|string|max:100',
                'dob'=>'required',
                'std'=>'required',
                'email'=>'required|email'];
        $message = ['fname.required'=>'First Name Required !!!',
                     'fname.max' =>'length not exceed 100',
                     'fname.string' => 'should be string',
                     'lname.required'=>'Last Name Required',
                     'lname.max' =>'', 'Length Shoud not exceed ',
                     'dob.required' =>'Dob Required',
                     'std'=>'Standard Required',
                     'email.required'=>'Email Required',
                     'email.email'=>'Please Enter A Valid Email'
                    ];
    
        $validator = Validator::make($request->all(),$rules,$message);

            if ($validator->fails())
            {   
            
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else
            {
                $data = student::create([
                    'first_name'=>$request->fname,
                    'last_name'=>$request->lname,
                    'dob'=>$request->dob,
                    'email'=>$request->email,
                    'std'=>$request->std]);
                return $data;
            }
        
        
    }
  public function edit(Request $request)
  {
    $data = student::find($request->id);
    $standard = standard::all();
    return view('student/edit')->with(['data'=>$data,"standard"=>$standard]);
  }
  public function update(Request $request,$id)
  {
    $data = student::find($request->id);
    $data->first_name=$request->fname;
    $data->last_name =$request->lname;
    $data->dob=$request->dob;
    $data->email =$request->email;
    $data->std=$request->std;
    $data->save();
    return redirect('/');
  }
  public function delete($id)
  {
    $student=student::find($id);
    if($student)
    {
      $student->delete();
      $json = array('status'=>200,'message'=>'Removed');
    }
    echo json_encode($json);
  }
}
