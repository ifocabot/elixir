        @extends('layouts.app',['title'=>'Data User','content'=>'Data User'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header col-12">
                    <h4 class="col-8">List User</h4>
                </div>
               <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
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