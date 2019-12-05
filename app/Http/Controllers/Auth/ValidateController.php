<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ValidateController extends Controller
{
    public function email(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email:rfc,dns', Rule::unique('users')],
        ]);

        return redirect()->back();
    }
}
