<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Mail\User\Passwordmail;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'name' => 'string',
            'email' => 'string|email|unique:users',
            'role' => 'integer',
        ]);
        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Mail::to($data['email'])->send(new Passwordmail($password));
        event(new Registered($user));

        return redirect()->route('user.index');
    }
}
