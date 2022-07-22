<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if($request->ajax()){
                $data = User::select('*');
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = '<a href="/user/'.$data->id.'/edit" class="edit btn btn-success btn-sm">Edit</a> <a href="'.route('user.destroy',['user' => $data->id]).'" class="delete btn btn-danger btn-sm" >Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

            return view('tables.daftarUser');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.tambahUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new user;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->level = $request->level;
        $model->password = bcrypt($request->password);
        $model->save();

        return redirect('user')->with('toast_success', 'User Baru Berhasil Ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('forms.editUser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = user::findorfail($id);
        $model->name = $request->name;
        $model->email = $request->email;
        $model->level = $request->level;
        $model->password = bcrypt($request->password);
        $model->save();

         return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){

	$user->delete();

	return redirect('/user')->with('success', 'Data telah dihapus.'); 
    
    }
}
