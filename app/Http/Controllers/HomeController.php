<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\TransportType;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $transportTypes = TransportType::all();

        return view('home', compact('transportTypes'));
    }
}
