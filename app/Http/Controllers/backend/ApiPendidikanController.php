<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiPendidikanController extends Controller
{
    
    public function getAll()
    {
        return response()->json(Pendidikan::all(), 201);
    }
}
