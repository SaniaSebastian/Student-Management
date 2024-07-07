<?php

namespace App\Http\Controllers;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Address;
use App\Models\SubjectMark;
use App\Models\Subject;
use Illuminate\Support\Facades\Log;
use DB;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        $students = Student::with('address', 'subjectMarks')->get();
        
        return view('students.student_data', compact('students','subjects'));
        
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
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'dob' => 'required|date',
        'admission_number' => 'required|string|max:255|unique:students',
        'father_name' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
        'class' => 'required|string|max:255',
        'division' => 'required|string|max:255',
        'house_name' => 'required|string|max:255',
        'post_office' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'pincode' => 'required|string|max:10',
        'marks' => 'required|array',
        'marks.*' => 'required|integer|min:0|max:100'
    ]);

    try {
        DB::beginTransaction();
        $student = Student::create($request->only(
            'name',
            'dob',
            'admission_number',
            'father_name',
            'mother_name',
            'class',
            'division'
        ));
        $address = new Address($request->only(
            'house_name',
            'post_office',
            'city',
            'pincode'
        ));

        $student->address()->save($address);

        foreach ($request->marks as $subjectId => $mark) {
            SubjectMark::create([
                'student_id' => $student->id,
                'subject_id' => $subjectId,
                'mark' => $mark,
            ]);
        }
        DB::commit();

        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        dd($e);
        Log::error('Error creating studentssss: ' . $e->getMessage(), ['exception' => $e]);

        return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the student. Please try again.']);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
