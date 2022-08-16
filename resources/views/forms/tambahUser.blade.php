        @extends('layouts.app',['title'=>'Tambah User','content'=>'Form Tambah User'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah User</h4>
                </div>
                <form method="POST" action="{{ url('user') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" style="text-transform: lowercase">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Rute</label>
                            <select class="js-example-basic-single" name="rute">
                                <option value="">--Level--</option>
                                @foreach ($rute as $a)
                                <option value="{{$a->id}}">{{$a->nama_area}}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="js-example-basic-single" name="level">
                                <option value="">--Level--</option>
                                <option value="admin">Admin</option>
                                <option value="pegawai">Pegawai</option>
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

        @endsection
