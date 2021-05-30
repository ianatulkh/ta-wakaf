<?php

namespace App\Http\Controllers\Auth;

use App\Agama;
use App\Desa;
use App\Http\Controllers\Controller;
use App\PendidikanTerakhir;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Wakif;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nik'                    => ['required', 'numeric', 'digits:16', 'unique:wakif,nik'],
            'tempat_lahir'           => ['required', 'string', 'max:35', 'min:3'],
            'tanggal_lahir'          => ['required', 'date'],
            'id_agama'               => ['required', 'numeric', 'digits:1'],
            'id_pendidikan_terakhir' => ['required', 'numeric', 'digits_between:1,2'],
            'pekerjaan'              => ['required', 'string', 'max:50', 'min:3'],
            'kewarganegaraan'        => ['required', 'string', 'max:50', 'min:3'],
            'alamat_singkat'         => ['required', 'string', 'max:100', 'min:5'],
            'rt'                     => ['required', 'numeric', 'digits:3'],
            'rw'                     => ['required', 'numeric', 'digits:3'],
            'id_desa'                => ['required', 'numeric', 'digits:10'],

            'name'                   => ['required', 'string', 'max:40', 'min:3'],
            'email'                  => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'               => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'id_role' => 2,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Wakif::create([
            'id_user'                => $user->id,
            'nama'                   => $data['name'],
            'nik'                    => $data['nik'],
            'tempat_lahir'           => $data['tempat_lahir'],
            'tanggal_lahir'          => $data['tanggal_lahir'],
            'id_agama'               => $data['id_agama'],
            'id_pendidikan_terakhir' => $data['id_pendidikan_terakhir'],
            'pekerjaan'              => $data['pekerjaan'],
            'kewarganegaraan'        => $data['kewarganegaraan'],
            'alamat_singkat'         => $data['alamat_singkat'],
            'rt'                     => $data['rt'],
            'rw'                     => $data['rw'],
            'id_desa'                => $data['id_desa'],
            'kecamatan'              => 'Pulosari',
            'kabupaten'              => 'Kab. Pemalang',
            'provinsi'               => 'Jawa Tengah',
        ]);

        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register', [
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'agama' => Agama::all(),
            'desa' => Desa::all()
        ]);
    }
}
