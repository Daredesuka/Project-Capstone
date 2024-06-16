<!DOCTYPE html>
<html>

<head>
    <title>Print History Report</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 2mm;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 4px;
        text-align: center;
        font-size: 12px;
        /* Reduced font size */
    }

    .table th {
        background-color: #f4f4f4;
        color: #333;
    }

    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tr:hover {
        background-color: #f1f1f1;
    }

    .table th {
        padding-top: 4px;
        padding-bottom: 2px;
        text-align: center;
        background-color: #4CAF50;
        color: white;
    }

    .badge {
        display: inline-block;
        padding: 2px 4px;
        font-size: 8px;
        font-weight: bold;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .bg-danger {
        background-color: #d9534f;
    }

    .bg-primary {
        background-color: #337ab7;
    }

    .bg-success {
        background-color: #5cb85c;
    }

    h3 {
        margin: 2px 0;
    }

    @media print {
        @page {
            size: A4 landscape;
            margin: 4mm;
        }

        body {
            margin: 4mm;
        }

        table {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <br>
    <table class="table table-hover table-striped table-bordered text-center" cellspacing="1" width="100%" border="1">
        <thead>
            <tr class="success">
                <td colspan="12" style="font-family: sans-serif;text-align: center;">
                    <div style="text-align: center;">
                        <h3>History Report</h3>
                        <h3>Company Safety Reporting</h3>
                    </div>
                </td>
            </tr>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status Karyawan</th>
                <th>Departemen</th>
                <th>Kategori Bahaya</th>
                <th>Isi Laporan</th>
                <th>Lokasi Kejadian</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach($data as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->status_karyawan}}</td>
                <td>{{$item->departemen}}</td>
                <td>{{$item->kategori_bahaya}}</td>
                <td>{{$item->contents_of_the_report}}</td>
                <td>{{$item->lokasi_kejadian}}</td>
                <td>{{$item->date_report}}</td>
                @if ($item->status == "0")
                <td><span class="badge rounded-pill bg-danger">Unprocessed</span></td>
                @elseif($item->status == 'process')
                <td><span class="badge rounded-pill bg-primary">Processed</span></td>
                @else
                <td><span class="badge rounded-pill bg-success">Finished</span></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
<script>
window.print();
</script>