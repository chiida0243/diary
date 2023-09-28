<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all(); // すべての計画表を取得する例
        return view('plans.index', ['plans' => $plans]);
    }
}
