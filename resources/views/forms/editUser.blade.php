        @extends('layouts.app',['title'=>'Edit User','content'=>'Form Edit User'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit User</h4>
                </div>
                <form action="{{ route('user.update',$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" style="text-transform: lowercase">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Rute</label>
                            <select class="js-example-basic-single" name="rute">
                                <option value="">--Rute--</option>
                                @foreach ($rute as $a)
                                <option value="{{$a->id}}">{{$a->nama_area}}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="js-example-basic-single" name="level">
                                @if ($user->level == "admin")
                                <option value="admin" selected>Admin</option>
                                <option value="pegawai">Pegawai</option>
                                @else
                                <option value="admin">Admin</option>
                                <option value="pegawai"selected>Pegawai</option>
                                @endif
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
