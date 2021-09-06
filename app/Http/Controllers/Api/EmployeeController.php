<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\CreateRequest;
use App\Http\Requests\Employees\EditRequest;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function show($id)
    {
        $employee = Employee::where("id", $id)->first();
        return response()->json($employee);
    }


    public function store(CreateRequest $request)
    {
        $employee = Employee::create($request->except(['photo']));

        if ($request->photo) {
            $name = time() . ".png";
            $img = Image::make($request->photo)->encode('png')->resize(240, 200);
            $path = "backend/employees/" . $name;
            $img->save($path);

            Employee::where("id", $employee->id)
                ->update([
                    'photo' => "backend/employees/" . $name
                ]);
        }

        return response()->json([
            'errors' => []
        ]);
    }

    public function update(EditRequest $request, $id)
    {
        Employee::where("id", $id)->update($request->except(['newphoto']));

        $employee = Employee::where("id", $id)->first();

        if ($request->newphoto) {

            // Delete Old Photo
            if ($employee->photo) {
                unlink($employee->photo);
            }

            $name = time() . ".png";
            $img = Image::make($request->newphoto)->encode('png')->resize(240, 200);
            $path = "backend/employees/" . $name;
            $img->save($path);

            Employee::where("id", $id)
                ->update([
                    'photo' => "backend/employees/" . $name
                ]);
        }
    }

    public function destroy($id)
    {
        $employee = Employee::where("id", $id)->first();

        if ($employee->photo) {
            unlink($employee->photo);
        }

        Employee::where("id", $id)->delete();
    }
}