<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
 
public function index()
{
    $breadcrumb = (object) [
        'title' => 'Daftar User',
        'list' => ['Home', 'User']
    ];
    $page = (object) [
        'title' => 'Daftar user yang terdaftar dalam sistem',
    ];
    $activeMenu = 'user'; // set menu yang sedang aktif

    $level = LevelModel::all(); //ambil data level untuk filter level
    
    return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
  }

//   public function list(Request $request)
//   {
//     $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
//     ->with('level');

      
//        // Filter data user berdasarkan level_id
//        if ($request->level_id) {
//         $users->where('level_id', $request->level_id);
//     } 
//       return DataTables::of($users)
//           // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
//           ->addIndexColumn()
//           ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
//             $btn = '<button onclick="modalAction(\''.url('/user/' . $user->user_id .
//             '/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button> ';
//             $btn .= '<button onclick="modalAction(\''.url('/user/' . $user->user_id .
//             '/edit_ajax').'\')" class="btn btn-warning btn-sm">Edit</button> ';
//             $btn .= '<button onclick="modalAction(\''.url('/user/' . $user->user_id .
//             '/confirm_ajax').'\')" class="btn btn-danger btn-sm">Hapus</button> ';
//             return $btn;
//           })
//           ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
//           ->make(true);
//   }

  // Menampilkan halaman form tambah user
    public function create() {
      $breadcrumb = (object) [
          'title' => 'Tambah User',
          'list' => ['Home', 'User', 'Tambah']
      ];
      $page = (object) [
          'title' => 'Form Tambah User',
      ];
      $level = LevelModel::all(); // Ambil data level untuk ditampilkan di form
      $activeMenu = 'user'; // Set menu yang sedang aktif
      return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
  }
    public function store(Request $request)
    {
      $request->validate([
        //username harus diisi, berupa string, minimal3 karakter, dan bernilai unik di tabel m_user kolom username
        'username' => 'required|string|min:3|unique:m_user.username',
        'nama'=> 'required|string|max:100',
        'password' => 'required|min:5',
        'level_id' => 'required|integer'
      ]);
      UserModel::create([
        'username' => $request->username,
        'nama'=> $request ->nama,
        'password' => bcrypt($request -> password),
        'level_id' => $request ->level_id
      ]);
      return redirect('/user')->with('success','Data user berhasil disimpan');
    }

    public function show(string $id){
      $user = usermodel::with('level')->find($id);
      $breadcrumb = (object) [
          'title' => 'Detail user',
          'list' => ['Home','User','Detail']
      ];
      $page = (object)[
          'title'=>'Detail user'
      ];
      $activeMenu = 'user';
      return view('user.show',['breadcrumb' =>$breadcrumb,'page'=>$page,'user'=>$user, 'activeMenu'=>$activeMenu]);
  }

  public function edit(string $id){
    $user = UserModel::find($id);
    $level = LevelModel::all();

    $breadcrumb = (object) [
        'title' => 'Edit user',
        'list' => ['Home', 'User', 'Edit']
    ];

    $page = (object) [
        'title' => 'Edit User'
    ];

    $activeMenu = 'user'; // set menu yang sedang aktif
    return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
}
public function update(Request $request, string $id) {
    $request->validate([
        // Username harus diisi, berupa string, minimal 3 karakter,
        // dan bernilai unik di tabel m_user kolom username kecuali untuk user dengan id yang sedang diedit
        'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
        'nama' => 'required|string|max:100',
        'password' => 'nullable|min:5',
        'level_id' => 'required|integer'
    ]);
    
    // Find the user instance first
    $user = UserModel::find($id);
    
    $user->update([
        'username' => $request->username,
        'nama' => $request->nama,
        'password' => $request->password ? bcrypt($request->password) : $user->password,
        'level_id' => $request->level_id
    ]);

    return redirect('/user')->with('success', 'Data user berhasil diubah');
}
public function destroy(string $id)
{
    // Cek apakah data user dengan ID yang dimaksud ada atau tidak
    $check = UserModel::find($id);
    
    if (!$check) {
        return redirect('/user')->with('error', 'Data user tidak ditemukan');
    }
    try {
        // Hapus data user
        UserModel::destroy($id);
        return redirect('/user')->with('success', 'Data user berhasil dihapus');
    } catch (\Illuminate\Database\QueryException $e) {
        // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
        return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
    }
}
public function create_ajax(){
    $level = levelModel::select('level_id', 'level_nama')->get();
    return view('user.create_ajax')
        ->with('level', $level);
}
Public function store_ajax(Request $request){
    // cek apakah request brua ajax
    if($request->ajax()||$request->wantsJson()){
        $rules = [
            'level_id' => 'required|integer',
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:6'
        ];
    // use Illuminate\Support\Facades\Validator;
    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json([
            'status' => false,
            'message' => 'Validasi gagal',
            'msgField' => $validator->errors(),
        ]);
    }
    UserModel::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data user berhasil disimpan'
        ]);
    }
    redirect('/');
}

public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');
        
        //Filter data user berdasarkan level_id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }
        return DataTables::of($users)
        // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
        ->addIndexColumn()
        ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
            $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="'.url('/user/' . $user->user_id. '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/user/'.$user->user_id).'">'
            . csrf_field() . method_field('DELETE') .
            '<button type="submit" class="btn btn-danger btn-sm" onclick="return
            confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
            
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }
    public function edit_ajax(string $id){
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama') -> get();
        return view('user.edit_ajax', ['user' => $user, 'level' => $level]);
    }
    Public function update_ajax(Request $request, $id){ 
        // cek apakah request dari ajax 
        // dd('sdgjasd');
        if ($request->ajax()|| $request->wantsJson()) { 
            $rules = [ 
                'level_id' => 'required|integer', 
                'username' => 'required|max:20|unique:m_user,username,'.$id.',user_id', 
                'nama'     => 'required|max:100', 
                'password' => 'nullable|min:6|max:20' 
            ]; 
            $validator = Validator::make($request->all(), $rules); 
 
            if ($validator->fails()) { 
                return response()->json([ 
                    'status'   => false,    
                    'message'  => 'Validasi gagal.', 
                    'msgField' => $validator->errors()  
                ]); 
            } 
     
            $check = UserModel::find($id); 
            if ($check) { 
                if(!$request->filled('password') ){  
                    $request->request->remove('password'); 
                } 
                 
                $check->update($request->all()); 
                return response()->json([ 
                    'status'  => true, 
                    'message' => 'Data berhasil diupdate' 
                ]); 
            } else{ 
                return response()->json([ 
                    'status'  => false, 
                    'message' => 'Data tidak ditemukan' 
                ]); 
            } 
        } 
        return redirect('/'); 
    }
    public function confirm_ajax(string $id){
        $user = UserModel::find($id);
        return view('user.confirm_ajax', ['user' => $user]);
    }
    public function delete_ajax(Request $request, $id){
        if($request -> ajax() || $request -> wantsJson()){
            $user = UserModel::find($id);
            if($user){
                $user -> delete();
                return response() -> json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                return response() -> json([
                    'status' => false,
                    'message' => 'data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

}
  
//     public function tambah(){
//       return view('user_tambah');
//     }

//     public function tambah_simpan(Request $request) {
//       UserModel::create([
//           'username' => $request->username,
//           'nama' => $request->nama,
//           'password' => Hash::make($request->password),
//           'level_id' => $request->level_id,
//       ]);
     
//       return redirect('/user');
//   }

//     public function ubah($id) {
//       $user = UserModel::find($id);
//       return view('user_ubah', ['data' => $user]);

// }

//     public function ubah_simpan($id, Request $request) {
//       $user = UserModel::find($id);
//       $user->username = $request->username;
//       $user->nama = $request->nama;
//       $user->password = Hash::make('$request->password');
//       $user->level_id = $request->level_id;

//       $user->save();
//     }


//       public function hapus($id) {
//       $user = UserModel::find($id);
//       $user->delete();
//       return redirect('/user');
      
//     }

// }




    //   $user = UserModel::create([
    //     'username' => 'manager11',
    //     'nama' => 'Managers11',
    //     'password' => Hash::make('12345'),
    //     'level_id' => 2,
    // ]);
    // $user->username = 'manager12';
    // $user->save();
    
    // return view('user', ['data' => $user]);
    // $user->wasChanged(); // true
    // $user->wasChanged('username'); // true
    // $user->wasChanged(['username', 'level_id']); // true
    // $user->wasChanged('nama'); // false
    // dd($user->wasChanged(['nama', 'username'])); //true

      // $user = UserModel::Create(
      //   [
      //     'username' => 'manager44',
      //     'nama' => 'Manager44',
      //     'password' => Hash::make('12345'),
      //     'level_id' => 2
      //    ],
      // );

      //   $user->username = 'manager56';

      //   $user->isDirty(); // True
      //   $user->isDirty('username'); // True
      //   $user->isDirty('nama'); // False
      //   $user->isDirty(['nama', 'username']); //True

      //   $user->isClean(); // False
      //   $user->isClean('username'); // False
      //   $user->isClean('nama'); // True
      //   $user->isClean(['nama', 'username']); //False

      //   $user->save();

      //   $user->isDirty(); //False
      //   $user->isClean(); //True
      //   dd($user->isDirty());

      // $user->save();
      // return view('user', ['data' => $user]);

      // $user = UserModel::where('level_id', 2)->count();
      // return view('user', ['data' => $user]);

      // $user = UserModel::where('level_id', 2)->count();
      // dd($user);
      // return view('user', ['data' => $user]);

      // tambah data user dengan Eloquent Model
      
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama'  => 'Manager 3',
        //     'password' => Hash::make('12345'),
            
        //  ];
        // UserModel::create($data); //tambahkan data ke tabel m_user


        //  //coba akses model UserModel
        //  $user = UserModel::all(); //Ambil semua data dari tabel m_user
        //  return view('user', ['data' => $user]);



        // $data = [
        //     'nama'  => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data); //update data user