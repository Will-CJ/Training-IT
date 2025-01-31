<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(Student $student){
        $this->student = $student;
    }
    
    
    public function index()
    {
        $students = $this->student->all();
        // dd($students->toArray());
        return view('student', [
            'title' => 'Training IT',
            'students' => $students->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = $this->student->validationRules();
        $messages = $this->student->validationMessages();
        $requestFillable = $request->only($this->student->getFillable());

        // $validator = Validator::make($requestFillable, $rules, $messages);
        // if ($validator->fails()) {
        //     return $validator->errors()->first();
        // }
        // $this->student->create($requestFillable);
        // return 'success';

        $validator = Validator::make($requestFillable, $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        $this->student->create($requestFillable);
        return response()->json(['success' => true, 'message' => 'Data berhasil ditambahkan']);



    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Student $student)
    {
        $student->delete();
    }
}
