<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    //api
    public function getData()
    {
        return Symptom::all();
    }

    public function createData(Request $request)
    {
        $symptom = new Symptom;
        $symptom->symptom_name = $request->symptom_name;
        $symptom->save();
        return "Symptom data saved successfully";
    }

    public function updateData(Request $request, $id)
    {
        $symptom_name = $request->symptom_name;
        $symptom = Symptom::find($id);
        $symptom->symptom_name = $symptom_name;
        $symptom->save();
        return "Symptom data was updated successfully";
    }

    public function deleteData($id)
    {
        $symptom = Symptom::find($id);
        $symptom->delete();
        return "Symptom data has been successfully deleted";
    }


    //web
    public function index()
    {
        $data = [
            'symptom' => Symptom::all(),
        ];
        return view('v_symptom', $data);
    }

    public function detail($id)
    {
        if (!$this->Symptom->detail($id)) {
            abort(404);
        }
        $data =
            [
                'symptom' => $this->Symptom->detail($id),
            ];
        return $data;
    }

    public function add()
    {
        return view('v_addsymptom');
    }

    public function insert(Request $request)
    {
        Request()->validate(
            [
                'symptom_name' => 'required|unique:symptoms,symptom_name|min:3'
            ],
            [
                'symptom_name.required' => 'Symptom name is mandatory',
                'symptom_name.unique' => 'Symptom name already exists (duplicate)',
                'symptom_name.min' => 'Symptom name less than 3 letters'
            ]
        );

        $data =
            [
                'symptom_name' => Request()->symptom_name,
            ];

        $this->Symptom->addData($data);

        return redirect('/symptom')->with('message', 'Symptom data saved successfully');
    }

    public function edit($id)
    {
        if (!$this->Symptom->detail($id)) {
            abort(404);
        };
        $data = [
            'symptom' => $this->Symptom->detail($id),
        ];
        return view('v_editsymptom', $data);
    }

    public function update($id)
    {
        Request()->validate(
            [
                'symptom_name' => 'required|min:3'
            ],
            [
                'symptom_name.required' => 'Symptom name is mandatory',
                'symptom_name.min' => 'Symptom name less than 3 letters'
            ]
        );

        $data =
            [
                'symptom_name' => Request()->symptom_name,
            ];

        $this->Symptom->editData($id, $data);
        return redirect()->route('symptom')->with('message', 'Symptom data was updated successfully');
    }

    public function delete($id)
    {
        $this->Symptom->deleteData($id);
        return redirect()->route('symptom')->with('message', 'Symptom data has been successfully deleted');
    }
}
