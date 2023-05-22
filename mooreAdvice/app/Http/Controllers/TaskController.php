<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Http\Requests\CreateTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   
    public function index()
    {
        
        return Task::all();
    }

   
    public function store(CreateTask $request)
    {
       // return $request->all();
         // $request->validated();
           
            try{
                //return $request->all();
                Task::firstOrCreate($request->all());
                return  response()->json(['succes' => "Task has been successfully created"], 201);
    
            }
            catch(\Exception $e){
               
                return  response()->json(['error' => "Task creation was not succesful". $e], 500);
            }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Task::findorFail($id);
    }

   
     public function update(CreateTask $request, $task)
     {
        
         $request->validated();
        try {
            $Task = Task::find($task);
            if ($Task) {
                $Task->update($request->all());
                return response()->json(['success' => 'Update successful'], 200);
            } else {
                return response()->json(['error' => 'Task not found'], 404);
            }
        } catch (\Exception $e) {
    
            return response()->json(['error' => 'Update failed'.$e], 500);
        }
        
     }

     //public function destroy(Task $Task)
     public function destroy($id)
     {
         try {
             $task =Task::findorFail($id)->delete();
             return  response()->json(['success' => "The task has been successfully deleted"], 201);
         } catch(Exception $e) {
            return  response()->json(['error' => "The task deletion was not successful"], 401);
         }
     }
}
