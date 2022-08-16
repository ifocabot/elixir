        @extends('layouts.app',['title'=>'Outstanding Pickup','content'=>'Outstanding Pickup'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
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
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pickup as $p )
                            <tr>
                                <td scope="row">{{$loop->iteration }}</td>    
                                <td>{{$p->customer->nama_customer }}</td>
                                <td>{{$p->customer_id}}</td>
                                <td>asd</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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