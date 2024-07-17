<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriorityIntroducerController extends Controller
{
    public function addInit(Request $request) {
        $data = array("abcd" => "sssuuuu");

        return $this->successResponse($data);
    }
}
