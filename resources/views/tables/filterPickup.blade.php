        @extends('layouts.app',['title'=>'Tambah Pickup','content'=>'Form Tambah Pickup'])

        @section('content')
    
            @include('sweetalert::alert')
            <div class="card">
                <div class="card-header">
                    <h4>Pickup Active</h4>
                </div>
                <div class="card-body">
                    <div class="search-element">
                        <input type="search" id="myInput" onkeyup="myFunction()" class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" style="width: 250px;">
                    </div>
                    <table id="myTable" class=" table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Pickup date</th>
                                <th scope="col">Area</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pickup2 as $p)
                            <tr>
                                <th scope="row">{{$loop->iteration }}</th>
                                <td>{{ $p->customer->nama_customer }}</td>
                                <td>{{ $p->created_at->format('d-m-y') }}</td>
                                <td>{{ $p->customer->area->nama_area}}</td>                                
                                <td><a href="{{ route('customer.show', $p->customer->id) }}" class="btn btn-success mr-"><i class="fa fa-location-arrow" aria-hidden="true"></i></a></td>
                                @if($p->status < 1) <form action="{{ route('test',$p->id) }}" method="POST">
                                    <td>
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="1">
                                        <input type="hidden" name="staff_pickup" value="{{ auth()->user()->name }}">
                                        <input type="hidden" name="jam_datang" value="{{ Carbon\Carbon::now() }}">
                                        <button class="btn btn-success mr-1" type="submit">Datang</button>
                                    </td>
                                    </form>
                                    @elseif($p->status <2) <td>
                                        <a class="btn btn-success mr-1" href="{{ route('pickup.edit', $p->id) }}">Selesai</a>
                                        </td>
                                        @elseif ($p->status < 3 )
                                        <td>
                                            <a href="{{route('HoIn',$p->id)}}" class="btn btn-warning mr-1" role="button" aria-disabled="true">Ho-In</a>
                                        </td>
                                        @else
                                        <td>
                                            <a href="{{route('ReportIn',$p->id)}}" class="btn btn-dark mr-1" role="button" aria-disabled="true">Report</a>
                                        </td>
                                        @endif
                                        <td><a href="/pickup/detail/{{ $p->id }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Detail</a></td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
