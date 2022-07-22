        @extends('layouts.app',['title'=>'Konfirmasi Pickup','content'=>'Form Konfirmasi pickup'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Konfimasi Pickup</h4>
                </div>
                    <form action="{{ route('HoInStore',$pickup->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>User Ho In</label>
                            <input type="text" class="form-control" readonly="" value="{{ auth()->user()->name }}" name="ho_user">
                            <label>Total Pickup</label>
                            <input type="text" class="form-control" readonly="" value="{{ $pickup->total_pickup}}">
                            <label>Status Ho In</label>
                            <select class="custom-select my-1 mr-sm-2" name="ho_in_status">
                                <option value="1" selected>Cocok</option>
                                <option value="2">Kurang</option>
                            </select>
                            <label>Note Ho In</label>
                            <input type="textarea" class="form-control" name="ho_in_note">
                            <input type="hidden" name="status" value="4">                            
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>

        @endsection
