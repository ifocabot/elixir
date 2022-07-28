<?php

namespace App\Exports;

use App\Models\customer;
use App\Models\pickup;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PickupExport implements ShouldAutoSize,WithMapping, WithHeadings, FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function query()
    {
        $to = Carbon::now();
        $date = Carbon::yesterday();

        return pickup::whereBetween('created_at',[$date,$to])->with('customer');
    }
    public function map($pickup):array
    {
        return [
            $pickup->id,
            $pickup->customer->nama_customer,
            $pickup->staff_input_cs,
            $pickup->total_pickup,
            $pickup->staff_pickup,
            $pickup->jam_datang,
            $pickup->jam_selesai,
            $pickup->created_at
        ];
    }
    public function headings(): array
    {
        return[
            'No',
            'Nama Customer',
            'Staff Cs',
            'Total Pickup',
            'Staff Pickup',
            'Jam Datang',
            'Jam Keluar',
            'Dibuat Tanggal'
        ];
    }

}
