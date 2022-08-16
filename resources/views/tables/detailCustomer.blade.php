        @extends('layouts.app',['title'=>'Detail Customer','content'=>'Detail Customer'])

        @section('content')

<div class="col-12 col-md-12 col-lg-12">
                <div class="card card-danger">
                  <div class="card-header">
                    <h4>Profile -> {{$customer->nama_customer}} </h4>
                  </div>
                  <div class="card-body">
                   <div class="col-12 col-md-12 col-lg-12">
                    <div>
                        <table id="myTable" class="table table-bordered">
                                <tr>
                                        <td>Nama Customer</td>
                                        <td><b>{{$customer->nama_customer}}</b></td>
                                </tr>
                                <tr>
                                        <td>Kode Customer</td>
                                        <td><b>{{$customer->kode_customer}}</b></td>
                                </tr>
                                <tr>
                                        <td>Alamat Customer</td>
                                        <td><b>{{$customer->alamat_customer}}</b></td>
                                </tr>
                                <tr>
                                        <td>Google Maps</td>
                                        <td></td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                  </div>
                </div>
              </div>
                @endsection