<?php

namespace App\Http\Controllers;

use App\Exports\PickupExport;
use App\Exports\PickupExportAll;
use App\Models\customer;
use PDF;
use App\Models\pickup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;




class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $to = Carbon::now();
        $date = Carbon::yesterday();

        $pickup = pickup::whereBetween('created_at',[$date,$to])->paginate(10);
        $balance = pickup::whereDate('created_at',carbon::today())->sum('total_pickup');
        $customer = Customer::all();
        return view('tables.riwayatPickups',compact(
            'pickup',
            'customer',
            'balance',
            'to',
            'date'
        ));
    }

    public function exportToday()
    {
        return Excel::download(new PickupExport, 'pickup.xlsx');
    }

        public function exportAll()
    {
        return Excel::download(new PickupExportAll, 'pickupAll.xlsx');
    }

    public function cetak_pdf()
    {
    	$pickup = pickup::all();

        $pdf = PDF::loadView('layouts.pdf_view',['pickup'=>$pickup]);
        return $pdf->download('laporan-pegawai-pdf');
    }

    public function detailPickup($id)
    {
        $pickup = pickup::findOrFail($id);
        return view('tables.detailPickup',compact(
            'pickup'
        ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pickup = pickup::all();
        $pickup2 = pickup::wheredate('created_at',Carbon::today())->where('status','<', 5)->get();
        $customer = customer::all();
        return view('forms.tambahPickups',compact(
            'customer',
            'pickup',
            'pickup2'
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
        $model = new Pickup;
        $model->customer_id = $request->customer_id;
        $model->status = $request->status;
        $model->staff_input_cs = $request->staff_input_cs;
        $model->kode_pickup = random_int(10000,99999);
        $model->save();

        return redirect('pickup/create')->with('toast_success', 'Data Pickup Berhasil Ditambahkan!');
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
    public function edit(pickup $pickup)
    {
        return view('forms.editPickups',compact('pickup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $folderPath = storage_path('app/public/');

        $image_parts = explode(";base64,", $request->signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $signature = uniqid() . '.'.$image_type;

        $file = $folderPath . $signature;

        file_put_contents($file, $image_base64);

        $pickup = pickup::findOrFail($id);
        $pickup->total_pickup = $request->total_pickup;
        $pickup->status = $request->status;
        $pickup->jam_selesai = $request->jam_selesai;
        $pickup->signature = $signature;
        $pickup->customer_pickup_name = $request->customer_pickup_name;
        $pickup->noted_pickup = $request->noted_pickup;
        $pickup->save();
        return redirect('pickup/create');
    }

    public function test(Request $request, $id)
    {
        $pickup = pickup::findOrFail($id);
        $pickup->update($request->all());
        return redirect('pickup/create');
    }

    public function HoIn(pickup $pickup, $id)
    {

        $pickup = pickup::findOrFail($id);
        return view('forms.hoinPickup', compact(
            'pickup'
        ));
    }

    public function HoInStore(Request $request, $id)
    {
                $pickup = pickup::findOrFail($id);
                        $pickup->update($request->all());
                                return redirect('pickup/create');
    }

        public function ReportIn(pickup $pickup, $id)
    {

        $pickup = pickup::findOrFail($id);
        return view('forms.reportInPickup', compact(
            'pickup'
        ));
    }
        public function ReportInStore(Request $request, $id)
    {
                $pickup = pickup::findOrFail($id);
                $pickup->update($request->all());
                return redirect('pickup/create');
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

    public function listPickup()
    {

        $now = carbon::now();
        $month = $now->format('m');

        $pickup = pickup::wheremonth('created_at',$month)->paginate(10);
        $pickup2 = pickup::where('status','<',2)->get();
        $customer = customer::all();
        return view('tables.listPickup',compact(
        'pickup',
        'pickup2',
        'customer'
        ));
    }

    public function aktif()
    {

    }

}
