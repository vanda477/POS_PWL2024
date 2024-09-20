<?php

namespace App\Http\Controllers;

use App\Models\UserModel;   // mengimpor model UserModel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    // mengimpor kelas Hash

class UserController extends Controller

{
    public function index()
    {
        // $data = [
        //     'username' => 'Customer-1',
        //     'nama' => 'Pelanggan Pertama',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];

        // UserModel::insert($data);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')


        // ];
        // UserModel::create($data);

        // $user = UserModel::find(1);
        // $user = UserModel::where('level_id', 1)->first();
        // $user = UserModel::firstwhere('level_id', 1);
        // $user = UserModel::findOr(1, ['username', 'nama'], function(){
        //     abort(404);
        // });

        // $user = UserModel::findOr(20, ['username', 'nama'], function(){
        //     abort(404);
        // });

        // $user = UserModel::findOrFail(1);
        $user = UserModel::where('username', 'manager9')->firstOrFail();

        return view('user', ['data' => $user]);
    }
}
