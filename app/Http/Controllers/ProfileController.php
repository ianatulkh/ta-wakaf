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
    public function update(Request $request, User $user)
    {
        $this->validator($request);

        if($request->user == "true"){
            $new = (object)$request->all();

            if($request->password == null){
                unset($new->password);
            } else {
                $new->password = Hash::make($request['password']);
            }
            
            $user->update((array) $new);

        } else {
            $user->update([
                'name' => $request->name
            ]);
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

    protected function validator(Request $request)
    {
        return $this->validate($request, [
            'nik'                    => ['required', 'numeric', 'digits:16', 'unique:wakif,nik,'.auth()->user()->wakif->id],
            'tempat_lahir'           => ['required', 'string', 'max:35', 'min:3', 'regex:/^[a-zA-ZÑñ\s]+$/'], //text
            'tanggal_lahir'          => ['required', 'date'],
            'id_agama'               => ['required', 'numeric', 'digits:1'],
            'id_pendidikan_terakhir' => ['required', 'numeric', 'digits_between:1,2'],
            'pekerjaan'              => ['required', 'string', 'max:50', 'min:3', 'regex:/^[a-zA-ZÑñ\s]+$/'], //text
            'no_wa'                  => ['required', 'numeric', 'digits_between:10,15', 'regex:/(08)[0-9]/'],
            'rt'                     => ['required', 'numeric', 'digits:3'],
            'rw'                     => ['required', 'numeric', 'digits:3'],
            'id_desa'                => ['required', 'numeric', 'digits:10'],
            'name'                   => ['required', 'string', 'max:40', 'min:3', 'regex:/^[a-zA-ZÑñ\s]+$/'],
        ], [
            'tempat_lahir.regex' => 'Isian harus berupa karakter huruf',
            'pekerjaan.regex' => 'Isian harus berupa karakter huruf',
            'name.regex' => 'Isian harus berupa karakter huruf'
        ]);
    }
}
