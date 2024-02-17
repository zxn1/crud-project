<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayam = "kucing";
        $students = StudentProfile::get(); //untuk dapatkan record dalam database table student_profiles
        return view('student.index', compact('students', 'ayam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $student = new StudentProfile;
            $student->name = $request->name;
            $student->gender = $request->gender;
            $student->phone_number = $request->phone_number;
            $student->matric_number = $request->matric_number;
            $student->address = $request->address;
            $student->age = $request->age;
        } catch (\Exception $ex) {
            //logic to catch error
        }

        $student->save();
        return redirect()->route('students.index')->with('success', 'student saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {
        try {
            $editStudent = StudentProfile::findOrFail($student);
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }
        return view('student.show', compact('editStudent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($student) // $student = 4
    {
        //return $student;
        try {
            $editStudent = StudentProfile::findOrFail($student);
        } catch (\Exception $ex) {
            //logic to handle error
        }

        return view('student.edit', compact('editStudent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student)
    {
        try {
            $storeStudent = StudentProfile::findOrFail($student);
            $storeStudent->name = $request->name;
            $storeStudent->gender = $request->gender;
            $storeStudent->phone_number = $request->phone_number;
            $storeStudent->matric_number = $request->matric_number;
            $storeStudent->address = $request->address;
            $storeStudent->age = $request->age;
            $storeStudent->save();
        } catch (\Exception $ex) {
            //logic to handle fails
        }

        return redirect()->route('students.index')->with('success', 'mantap');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student)
    {
        try {
            $deleteStudent = StudentProfile::findOrFail($student);
        } catch (\Exception $ex) {
            //logic to handle error
        }
        $deleteStudent->delete();
        return redirect()->route('students.index')->with('success', 'Mantap');
    }

    public function graph()
    {
        $studProfileMale = StudentProfile::where('gender', 'male')->get()->count(); //dapat male collection //kira collection - kita akan dapat jumlah record
        $studProfileFemale = StudentProfile::where('gender', 'female')->get()->count();
        // return response([
        //     'male' => $studProfileMale,
        //     'female' => $studProfileFemale
        // ]);

        return view('student.graph', compact('studProfileMale', 'studProfileFemale'));
    }
}
