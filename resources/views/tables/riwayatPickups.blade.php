        @extends('layouts.app',['title'=>'Data Pickups','content'=>'Riwayat Pickup Harian'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header col-12">
                    <h4 class="col-10">Data Pickup</h4>
                    <a href="{{ route('exportToday') }}" class="btn btn-success col-2 col-md-2 col-lg-2">Export Excel</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
                                <th>Total Pickup </th>
                                <th>Staff</th>
                                <th>Tanggal Pickup</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pickup as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->customer->nama_customer }}</td>
                                @if ($p->total_pickup > 1)
                                <td>{{$p->total_pickup}}</td>
                                @else
                                <td>Kosong</td>
                                @endif  
                                <td>{{ $p->staff_pickup }}</td>
                                <td>{{ $p->created_at->format('d M Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($p->jam_datang)->format('H:i')}}</td>
                                <td>{{ Carbon\Carbon::parse($p->jam_selesai)->format('H:i')}}</td>
                                    @if ($p->status == 1)
                                        <td><div class="badge badge-dark">Proses Pickup</div></td>
                                    @elseif ($p->status == 2)
                                        <td><div class="badge badge-dark">Sudah Pickup</div></td>
                                    @elseif ($p->status == 3)
                                    <td><div class="badge badge-danger">Batal Pickup</div></td>
                                    @elseif ($p->status == 4)
                                    <td><div class="badge badge-dark">Sudah HO</div></td>
                                    @else
                                    <td> <div class="badge badge-success">Success</div></td>
                                    @endif
                                <td><a href="/pickup/detail/{{ $p->id }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <nav>
                            <ul class="float-left">
                                <p>Total customer terpickup hari ini : <strong>{{ $pickup->total() }} Customer</strong> Total barang terpickup hari ini : <strong>{{ $balance}} Paket</strong></p>
                            </ul>
                            <ul class="pagination float-right">
                                {{ $pickup->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @endsection
