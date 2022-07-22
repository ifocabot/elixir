        @extends('layouts.app',['title'=>'Konfirmasi Pickup','content'=>'Form Konfirmasi pickup'])

        @section('content')

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Konfimasi Pickup</h4>
                </div>
                <form action="{{ route('pickup.update',$pickup->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Total paket</label>
                            <input type="number" class="form-control" name="total_pickup">
                            <label>Status</label>
                            <select class="custom-select my-1 mr-sm-2" name="status">
                                <option value="2" selected>Selesai</option>
                                <option value="3">Batal pickup</option>
                            </select>
                            <label>Note Pickup</label>
                            <input type="textarea" class="form-control" name="noted_pickup">
                            <label class="" for="">Draw Signature:</label>
                            <br />
                            <div id="signaturePad" style="width: 300px; height:200px"></div>
                            <br>
                            <button id="clear" class="btn btn-danger">Clear Signature</button>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                        </div>
                            <label>Nama Customer</label>
                            <input type="text" class="form-control" name="customer_pickup_name">
                        <input type="hidden" name="jam_selesai" value="{{ Carbon\Carbon::now() }}">
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>

        @endsection
