<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function __construct()
    {
        $this->Disease = new Disease();
    }

    //api
    public function getData()
    {
        return Disease::all();
    }

    public function createData(Request $request)
    {
        $disease = new Disease;
        $disease->disease_name = $request->disease_name;
        $disease->disease_desc = $request->disease_desc;
        $disease->disease_solution = $request->disease_solution;
        $disease->save();
        return "disease data saved successfully";
    }

    public function updateData(Request $request, $id)
    {
        $disease_name = $request->disease_name;
        $disease_desc = $request->disease_desc;
        $disease_solution = $request->disease_solution;
        $disease = Disease::find($id);
        $disease->disease_name = $disease_name;
        $disease->disease_desc = $disease_desc;
        $disease->disease_solution = $disease_solution;
        $disease->save();
        return "disease data was updated successfully";
    }

    public function deleteData($id)
    {
        $disease = Disease::find($id);
        $disease->delete();
        return "disease data has been successfully deleted";
    }

    //web
    public function index()
    {
        $data = [
            'disease' => Disease::all(),
        ];
        return view('v_disease', $data);
    }

    public function detail($id)
    {
        if (!$this->Disease->detail($id)) {
            abort(404);
        };
        $data = [
            'disease' => $this->Disease->detail($id),
        ];
        return view('v_detaildatadisease', $data);
    }

    public function add()
    {
        return view('v_adddisease');
    }

    public function insert()
    {
        Request()->validate(
            [
                'disease_name' => 'required|unique:diseases,disease_name|min:4',
                'disease_desc' => 'required|unique:diseases,disease_desc|min:4',
                'disease_solution' => 'required|unique:diseases,disease_solution|min:4'
            ],
            [
                'disease_name.required' => 'Disease name is mandatory',
                'disease_name.unique' => 'Disease name already exists (duplicate)',
                'disease_name.min' => 'Disease name less than 4 letters',

                'disease_desc.required' => 'Disease description is mandatory',
                'disease_desc.unique' => 'Disease description already exists (duplicate)',
                'disease_desc.min' => 'Disease description less than 4 letters',

                'disease_solution.required' => 'Disease solution is mandatory',
                'disease_solution.unique' => 'Disease solution already exists (duplicate)',
                'disease_solution.min' => 'Disease solution less than 4 letters'
            ]
        );

        $data =
            [
                'disease_name' => Request()->disease_name,
                'disease_desc' => Request()->disease_desc,
                'disease_solution' => Request()->disease_solution,
            ];

        $this->Disease->addData($data);
        return redirect('disease')->with('message', 'Disease data saved successfully');
    }

    public function edit($id)
    {
        if (!$this->Disease->detail($id)) {
            abort(404);
        };
        $data = [
            'disease' => $this->Disease->detail($id),
        ];
        return view('v_editdisease', $data);
    }

    public function update($id)
    {
        Request()->validate(
            [
                'disease_name' => 'required|min:4',
                'disease_desc' => 'required|min:4',
                'disease_solution' => 'required|min:4'
            ],
            [
                'disease_name.required' => 'Disease name is mandatory',
                'disease_name.min' => 'Disease name less than 4 letters',

                'disease_desc.required' => 'Disease desc is mandatory',
                'disease_desc.min' => 'Disease description less than 4 letters',

                'disease_solution.required' => 'Disease solution is mandatory',
                'disease_solution.min' => 'Disease solution less than 4 letters'
            ]
        );

        $data =
            [
                'disease_name' => Request()->disease_name,
                'disease_desc' => Request()->disease_desc,
                'disease_solution' => Request()->disease_solution,
            ];

        $this->Disease->editData($id, $data);
        return redirect('disease')->with('message', 'disease data was updated successfully');
    }

    public function delete($id)
    {
        $this->Disease->deleteData($id);
        return redirect('disease')->with('message', 'disease data has been successfully deleted');
    }
}
