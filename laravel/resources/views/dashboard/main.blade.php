@extends('dashboard.admin')

@section('judul')
    Home
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Transaksi</h3>
    
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="myChart" width="100%">

                </canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
            </div>
        <!-- Default box -->
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tabel Transaksi</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
            </div>
        </div>
        <div class="card-body">
            <table id="transaksi" class="display" style="width:100%" class="table table-hover st">
                <thead>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->jumlah}}</td>
                            <td>{{$item->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection

@push('datatables')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/date-1.2.0/fc-4.2.1/r-2.4.0/datatables.min.css"/>
@endpush

@push('script_datatables')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/date-1.2.0/fc-4.2.1/r-2.4.0/datatables.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#transaksi').DataTable();
            (function() {
        const data = {{ Js::from($charts['data']) }};

        new Chart(
            document.getElementById('myChart'),
            {
            type: 'bar',
            data: {
                labels: {{ Js::from($charts['labels']) }},
                datasets: [
                {
                    label: 'Rekap by year',
                    data: data
                }
                ]
            }
            }
        );
        })();
        })
    </script>

    <script>
    </script>
@endpush