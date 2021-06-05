<?php

namespace App\Http\Controllers;

use App\Agama;
use App\Desa;
use App\Http\Controllers\Controller;
use App\PendidikanTerakhir;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, User $user)
    {
        if($request->user == "true"){
            $new = (object)$request->all();

            if($request->password == null){
                unset($new->password);
            } else {
                $new->password = Hash::make($request['password']);
            }
            
            $user->update((array) $new);

        } else {
            $user->update($request->all());
            $user->wakif->update($request->all());
        }
        return redirect()->back()->withSuccess('berhasil disimpan!');
    }

    public function show()
    {
        return view('profile.index', [
            'user' => auth()->user(),
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'agama' => Agama::all(),
            'desa' => Desa::all()
        ]);
    }
}
