<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Area;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if($request->ajax()){
                $data = customer::select('*');
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/customer/'.$row->id.'/edit" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

            return view('tables.daftarCustomer');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = Area::all();
        return view('forms.tambahCustomer',compact(
            'area'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new customer;
        $model->nama_customer = $request->nama_customer;
        $model->alamat_customer = $request->alamat_customer;
        $model->area_id = $request->area_id;
        $model->save();

        return redirect('customer/create')->with('toast_success', 'Data Customer Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = customer::find($id);
        
        return view('tables.detailCustomer',compact(
            'customer'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customer::find($id);
        $area = Area::all();
        return view ('forms.editCustomer',compact(
            'customer',
            'area'
        ));
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
        $model = customer::findorfail($id);
        $model->nama_customer = $request->nama_customer;
        $model->alamat_customer = $request->alamat_customer;
        $model->area_id = $request->area_id;
        $model->save();

        return redirect('customer')->with('toast_success', 'Data Customer Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
