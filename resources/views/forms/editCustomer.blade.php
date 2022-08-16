        @extends('layouts.app',['title'=>'Edit Customer','content'=>'Form Edit Customer'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Customer</h4>
                </div>
                <form action="{{ route('customer.update',$customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Customer</label>
                            <input type="text" class="form-control" name="nama_customer" value="{{$customer->nama_customer}}">
                        </div>
                        <div class="form-group">
                            <label>Kode Customer</label>
                            <input type="text" class="form-control" name="kode_customer" value="{{$customer->kode_customer}}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat_customer" value="{{$customer->alamat_customer}}">
                        </div>
                        <div class="form-group">
                            <label>Rute</label>
                            <select class="js-example-basic-single" name="area_id">
                                <option value="">--Rute--</option>
                                @foreach ($area as $c)
                                @if($customer->area_id == $c->id)
                                <option value="{{ $c->id }}" selected>{{ $c->nama_area }}</option>
                                @else
                                <option value="{{ $c->id }}"`>{{ $c->nama_area }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        @include('sweetalert::alert')
        @endsection
