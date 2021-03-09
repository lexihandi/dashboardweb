<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        return Disease::all();
    }

    public function create(Request $request)
    {
        $disease = new Disease;
        $disease->disease_name = $request->disease_name;
        $disease->disease_desc = $request->disease_desc;
        $disease->disease_solution = $request->disease_solution;
        $disease->save();
        return "disease data saved successfully";
    }

    public function update(Request $request, $id)
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

    public function delete($id)
    {
        $disease = Disease::find($id);
        $disease->delete();
        return "disease data has been successfully deleted ";
    }
}
