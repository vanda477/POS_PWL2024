@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/supplier/import') }}')" class="btn btn-info">Import Supplier</button> 
                <a href="{{ url('/supplier/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export Supplier (XLSX)</a> 
                <a href="{{ url('/supplier/export_pdf') }}" class="btn btn-danger"><i class="fa fa-file-pdf"></i> Export Supplier (PDF)</a> 
                <button onclick="modalAction('{{ url('/supplier/create_ajax') }}')" class="btn btn-success">Tambah Data</button> 
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>
        <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Supplier Kode</th>
                    <th>Supllier Nama</th>
                    <th>Supllier Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
         function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
        $(document).ready(function() {
            var dataUser = $('#table_user').DataTable({
                // serverSide: true, jika ingin menggunakan server side processing 
                serverSide: true,
                ajax: {
                    "url": "{{ url('supplier/list') }}",
                    "dataType": "json",
                    "type": "POST",
                },
                columns: [{
                    // nomor urut dari laravel datatable addIndexColumn() 
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "supplier_kode",
                    className: "",
                    // orderable: true, jika ingin kolom ini bisa diurutkan  
                    orderable: true,
                    // searchable: true, jika ingin kolom ini bisa dicari 
                    searchable: true
                }, {
                    data: "supplier_nama",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "supplier_alamat",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }]
            });
        });
    </script>
@endpush