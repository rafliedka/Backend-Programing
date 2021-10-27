<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

        $data = [
            'message' => 'Get All Student',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request){
        
        $input = [
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $data = [
            'message' => 'student data has been created',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id){

        $student = Student::find($id);

        if($student){

            $input = [
                'name' => $request->name ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            $student->update($input);

            $data = [
                'message' => 'Student data has been updated',
                'data' => $student
            ];

            return response()->json($data);
        }

        else {
            $data = [
                'message' => 'Student not found',
            ];

            return response()->json($data);
        }
    }

    public function destroy(Request $request, $id){
        
        $student = Student::find($id);

        if($student){
            $student->delete();

        $data = [
            'message' => 'student data has been delete',
            'data' => $student
        ];

        return response()->json($data, 201);
        }

        else{
            $data =[
                'message' => 'student data not found'
            ];
              
            return response()->json($data);
        }
        
        
        
    }
}
