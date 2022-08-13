<?php

namespace App\Http\Controllers;

use App\Models\Confession;

class UpdateCredentialsController extends Controller
{
    public function show()
    {
        return view('pages.update-credentials');
    }
}
