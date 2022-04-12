<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(User $user)
    {
        $data = request()->validate([
            'name' => 'string',
            'email' => 'required|string|email',
            'user_id'=>'required|integer|exists:users,id',
            'role' => 'required|integer',
        ]);
        $user->update($data);
        return view('admin.users.show', compact('user'));
    }
}
