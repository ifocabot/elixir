        @extends('layouts.app',['title'=>'Data Customer','content'=>'Data customer'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header col-12">
                    <h4 class="col-8">List Customer</h4>
                </div>
               <div class="card-body">
                <table class="table table-bordered data-customer">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Customer</th>
                            <th>Nama Customer</th>
                            <th>Alamat Customer</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        @include('sweetalert::alert')
        @endsection
