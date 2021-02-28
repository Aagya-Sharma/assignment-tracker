<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Notifications\AssignmentCreation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Assignment;
use App\Group;
use App\User;
use Illuminate\Support\Facades\Notification;


use App\Student;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $groups=Group::all();
       // return $groups;
        return view('teacher.assignmentsection',compact('groups'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $group = Group::find($id);
        return view('teacher.create',compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            'title'=>'required',
             'resources'=>'nullable|mimes:pdf,zip',
             'description'=>'required',
         ]);
     
        $assignment = new Assignment();
        $assignment->title = $request->title;
        if (!empty($request->resources))
        {
        
        $fileName = time().'.'.$request->resources->getClientOriginalname(); 
        $request->resources->move(public_path('documents'), $fileName);
        $assignment->resources = $fileName;
        }
        $assignment->group_id = $id;
        $assignment->description=$request->description;
        $assignment->user_id = Auth::user()->id;
        $assignment->points = $request->points;
        $assignment->class = $request->class;
        $assignment->date = $request->date;
        $assignment->time = $request->time;
        $assignment->save();

        $students = User::all()->filter(function($user){
            return $user->roles =='student';
        });
         try {
                
             Notification::send($students, new AssignmentCreation($assignment));
             
         } catch(\Exception $e){

         }

        return redirect()->route('assignment')->with('message', 'Assignment has been assigned! :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userid = Auth::user()->id;
        $group = Group::find($id);
        $assignments = DB::table('assignments')
        ->where('group_id', '=', $id)
        ->where('user_id', '=', $userid)
        ->orderBy('date')
        ->get();
        return view('teacher.assignmentdashboard',compact('assignments','group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = Assignment::find($id);

        return view('teacher.editform',compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $assignment = Assignment::find($id);
        $assignment->title = $request->title;
        
                if($request->has('resources')){
        
                    $fileName = time().'.'.$request->resources->getClientOriginalname(); 
        
                    $request->resources->move(public_path('documents'), $fileName);
        
                    $assignment->resources = $fileName;
                }
                
                $assignment->description=$request->description;
                
                $assignment->points = $request->points;
                $assignment->class = $request->class;
                $assignment->date = $request->date;
                $assignment->time = $request->time;
                $assignment->save();
        
                return redirect()->route('assignmentdetails',$id)->with('message', 'Assignment has been updated! :)');
               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);
        $group = $assignment->group_id;
        $assignment->delete();

        
        return redirect()->route('assignment')->with('message', 'Assignment has been deleted!');
        

    }
    public function details($id)
    {
        $assignment=Assignment::find($id);
        $students = DB::table('students')
        ->where('assignment_id', '=', $id)
        ->orderBy('name')
        ->get();
    
        return view('teacher.assignmentdetails',compact('assignment','students'));
    }

    public function chartjs($id)
        {
            //return $id;
            
                // $assignments = DB::table('assignments')
                // ->where('user_id','=', Auth::user()->id)
                // ->get();

                $assignment= Assignment::select(\DB::raw("SUM(points) as count"))
                ->where('user_id','=', Auth::user()->id)
                    ->groupBy(\DB::raw("id"))
                    ->pluck('count');
                  
                
                
                    
                
       
                    $student = Student::select(\DB::raw("SUM(percentage) as count"))
                    ->where('user_id','=',$id)
                ->where('teacher_id','=',Auth::user()->id)
                    ->groupBy(\DB::raw("assignment_id"))
                    ->pluck('count');
                    // $class = User::find($id);
                    // $class_id = $class->id;

                    

        
           

            

               

                // $students = DB::table('students')
                // ->where('user_id','=',$id)
                // ->where('teacher_id','=',Auth::user()->id)
                // ->get();
         
            
           return view('chartjs',compact('assignment','student'));
           //return view('chartjs')
        
                   
        }
}
