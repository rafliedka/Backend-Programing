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
        
        // echo "mengupdate data student : $id";
        
        $student = Student::find($id);

        $student->name = $request->name;
        $student->nim = $request->nim;
        $student->email = $request->email;
        $student->jurusan = $request->jurusan;
        $student->save();

        $data = [
            'message' => 'student data has been update',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    public function destroy(Request $request, $id){
        
        // echo "menghapus data : $id";
        
        $student = Student::find($id);
        $student->delete();

        $data = [
            'message' => 'student data has been delete',
            'data' => $student
        ];

        return response()->json($data, 201);
    }
}
