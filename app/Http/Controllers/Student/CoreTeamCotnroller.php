<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CoreTeam;
use App\Models\Student;
use Illuminate\Http\Request;

class CoreTeamCotnroller extends Controller
{
    public function index()
    {
        return view('student.core-teams.index', [
            'coreTeams' => CoreTeam::with('student')
                ->orderBy('order')
                ->get()
        ]);
    }
}
