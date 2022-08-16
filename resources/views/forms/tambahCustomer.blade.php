        @extends('layouts.app',['title'=>'Tambah Customer','content'=>'Form Tambah Customer'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Customer</h4>
                </div>
                <form method="POST" action="{{ url('customer') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Customer</label>
                            <input type="text" class="form-control" name="nama_customer">
                        </div>
                        <div class="form-group">
                            <label>Kode Customer</label>
                            <input type="text" class="form-control" name="kode_customer">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat_customer">
                        </div>
                        <div class="form-group">
                            <label>Rute</label>
                            <select class="js-example-basic-single" name="area_id">
                                <option value="">--Rute--</option>
                                @foreach ($area as $c)
                                <option value="{{ $c->id }}">{{ $c->nama_area }}</option>
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
