        @extends('layouts.app',['title'=>'Konfirmasi Pickup','content'=>'Form Konfirmasi pickup'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Konfimasi Pickup</h4>
                </div>
                    <form action="{{ route('ReportInStore',$pickup->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>User Report</label>
                            <input type="text" class="form-control" readonly="" value="{{ auth()->user()->name }}" name="report_user">
                            <label>Hybrid</label>
                            <input type="number" class="form-control" name="report_hybrid">
                            <label>Cashless</label>
                            <input type="number" class="form-control" name="report_cashless">
                            <label>Orion</label>
                            <input type="number" class="form-control" name="report_orion">
                            <label>Cashless Ho Number</label>
                            <input type="text" name="report_ho_number" class="form-control">
                            <label>Note</label>
                            <input type="text" name="report_note" class="form-control">
                            <input type="hidden" name="status" value="5">                            
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
