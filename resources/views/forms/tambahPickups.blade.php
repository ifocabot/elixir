        @extends('layouts.app',['title'=>'Tambah Pickup','content'=>'Form Tambah Pickup'])

        @section('content')


        <div class="col-12 col-md-12 col-lg-12">
@if(auth()->user()->level == 'admin')
            <div class="card">
                <div class="card-header">
                    <h4>Form Pickup</h4>
                </div>

                <form method="POST" action="{{ url('pickup') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama customer</label>
                            <select class="js-example-basic-single" name="customer_id">
                                <option value="">--Nama Customer--</option>
                                @foreach ($customer as $c)
                                <option value="{{ $c->id }}">{{ $c->nama_customer }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="status" value="0">
                        <div class="form-group">
                            <label>Staff</label>
                            <input type="text" class="form-control" readonly="" value="{{ auth()->user()->name }}" name="staff_input_cs">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        @if(auth()->user()->level == 'admin')
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        @else
                        <button class="btn btn-primary mr-1 disabled" type="submit" disabled>Submit</button>
                        @endif
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
@endif
            
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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <script>
            function myFunction() {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }

        </script>
        @endsection
