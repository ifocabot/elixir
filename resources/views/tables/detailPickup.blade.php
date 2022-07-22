<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Detail buku pickup</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <table>
                        <tr style="border-bottom:1px solid black">

                            <td>
                                <img src="{{URL::asset('../assets/img/jne-bgg.png')}}" style="width: 100%; max-width: 150px" />
                            </td>

                            <td style="text-align: center;font-weight:bold;font-size:18px;">

                                MITRA PERWAKILAN JNE PURI MANSION GROUP<br />
                                (RUKO PURIMANSION BLOK B NO 11)(JL KEMBANGAN RAYA NO 36A)<br />



                                021 2295 5598 &emsp;021 2295 2304
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <hr style="border:1px solid #5f5e5e; height:0px;">


        <table cellpadding="0" cellspacing="0">
            <tr>
                <td style="text-align: center; font-size:16px; font-weight:bold"><u>SURAT PENGAMBILAN BARANG (PICKUP) </u> <br> No. &emsp;<u>#{{ $pickup->kode_pickup }}</u></td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" style="font-size:14px">
            <tr>
                <th style="width: 60%">
                    Diperintahkan Kerja Kepada :
                </th>
                <th style="width:40%">
                    Untuk melaksanakan Pick Up barang ke:
                </th>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" style="font-size:14px">
            <tr>
                <th>Nama : {{ $pickup->staff_pickup }} </th>
                <th style="width:40%">Customer&nbsp; : {{ $pickup->customer->nama_customer }}</th>
            </tr>
            <tr>
                <th>Unit&emsp;:</th>
                <th style="width:40%">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $pickup->created_at->format('Y-m-d') }} </th>
            </tr>
        </table>
        <br />

        <table style=" border: 1px solid black; text-align:center;  border-collapse: collapse;">

            <tr>
                <th style="border: 1px solid black;">TOTAL PAKET</th>

                <th style="border: 1px solid black;">PARAF CUSTOMER</th>

            </tr>
            <tr>
                <td style=" margin-top:50%; border: 1px solid black; height:150px; text-align:center; font-size:40px; vertical-align: middle;">{{ $pickup->total_pickup }}</td>
                <td style="margin-top:50%; border: 1px solid black; height:150px; text-align:center; font-size:40px; vertical-align: middle;"><img src="{{ URL::asset('storage/'.$pickup->signature)}}" style="height: 80px; weight:100px" alt=""></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align:center; font-size:13px; vertical-align: middle;">{{$pickup->customer_pickup_name}}</td>
            </tr>
        </table>

        <br>
        <p style="text-align: left; font-size:14px">Note Pickup : <i><b>{{$pickup->noted_pickup}}</b></i></p>
        <hr style="border:1px solid #5f5e5e; height:0px;">
        <p style="text-align: center; font-size:12px"> "Dokumen ini dibuat menggunakan komputer, Dokumen ini tidak membutuhkan tanda tangan atau cap untuk dikatakan sebagai dokumen yang valid"</p>


    </div>



</body>
</html>
