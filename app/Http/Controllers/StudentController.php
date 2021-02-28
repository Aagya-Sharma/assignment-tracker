<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Assignment;
use App\Group;
use App\Student;
use Brian2694\Toastr\Facades\Toastr;


class StudentController extends Controller
{
    public function index()
    {
        $groups=Group::all();
    
        //return $groups;
         return view('student.assignmentsection',compact('groups'));
    }
    public function show()
    {
        $id = Auth::user()->class_id;
        //return $id;
        $userid = Auth::user()->id;
        $group = Group::find($id);
        //to match the class id with the selected class id
        $assignments = DB::table('assignments')
        ->where('group_id', '=', $id)
        ->orderBy('date')
         ->get();

         $students = DB::table('students')
         ->where('user_id','=',Auth::user()->id)
         ->where('work','!=','NULL')
         ->get();
         //return $student;
        return view('student.assignmentdashboard',compact('assignments','group','students'));
    

    }
    public function details($id)
    {
        $student = DB::table('students')
        ->where('assignment_id', '=', $id)
        ->where('user_id','=', Auth::user()->id)
        ->first();
        $assignment=Assignment::find($id);
      ;
        //return $student;


        return view('student.assignmentdetails',compact('assignment','student'));
        
        //return back();
    }
    public function store(Request $request,$id)
    {
       //return $id;
       $assignment=Assignment::find($id);
        $request->validate([
            
             'work'=>'nullable|mimes:pdf,zip',
             'points'=>'nullable',
         ]);
       
        if($request->has('work'))
        {
            
        $student= new Student();
        $student->name = Auth::user()->name;
        $student->user_id = Auth::user()->id;
        $student->assignment_id = $id;
        $student->assignments_points = $assignment->points;
        
        $student->teacher_id = $assignment->user_id;
        

      
        $fileName = time().'.'.$request->work->getClientOriginalname(); 
        $request->work->move(public_path('documents'), $fileName);
        $student->work = $fileName;
             
        $student->save();
        return redirect()->back()->with('message', 'Assignment submitted successfully! :)');
        }
        else{
            return redirect()->back()->with('message', 'File is necessary! :)');
        }

        


        
    }
    public function points(Request $request,$id)
    {
        $student=  Student::find($id);
        
        //return $student;
        $student->points = $request->points;
        $student->feedback = $request->feedback;
        $student->percentage = ($student->points/$student->assignments_points)*100;


       $student->save() ;

       //return "Saved";

        //return redirect()->route('assignmentdetails',$student->assignment_id);
        //return view('teacher.assignmentdetails',compact('student',));
        // return back();
    }
    public function update(Request $request,$id)
    {

        $fileName = time().'.'.$request->work->getClientOriginalname(); 
        $request->work->move(public_path('documents'), $fileName);
        $work = $fileName;
        $student = DB::table('students')
        ->where('assignment_id', '=', $id)
        ->where('user_id','=', Auth::user()->id)
        ->update(['work' => $work,'points'=>NULL]);


        return redirect()->route('Stdetails',$id)->with('message','Assignments has been edited! :)');
        //return redirect()->back()->with('message','Assignments has been submitted');
    

       
        
        
    }
    

 
}
