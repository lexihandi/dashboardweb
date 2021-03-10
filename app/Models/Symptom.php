<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Symptom extends Model
{

    public function allData()
    {
        return DB::table('symptoms');
    }

    public function detail($id)
    {
        return DB::table('symptoms')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('symptoms')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('symptoms')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('symptoms')->where('id', $id)->delete();
    }
}
