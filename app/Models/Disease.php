<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    public function allData()
    {
        return DB::table('diseases');
    }

    public function detail($id)
    {
        return DB::table('diseases')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('diseases')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('diseases')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('diseases')->where('id', $id)->delete();
    }
}
