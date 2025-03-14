@extends('backend.layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><i class="icon_document_alt"></i> Riwayat Hidup </li>
                    <li><i class="fa fa-files-o"></i>Pendidikan</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Pendidikan
                    </header>

                    <div class="panel-body">
                        <a href="{{ route('pendidikan.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                        <br><br>

                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th><i class="icon_bag"></i> Nama</th>
                                    <th><i class="icon_document"></i> Tingkatan</th>
                                    <th><i class="icon_calendar"></i> Tahun Masuk</th>
                                    <th><i class="icon_calendar"></i> Tahun Selesai</th>
                                    <th style="width: 150px"><i class="icon_cogs"></i> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendidikan as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tingkatan }}</td>
                                    <td>{{ $item->tahun_masuk }}</td>
                                    <td>{{ $item->tahun_keluar }}</td>
                                    <td>
                                        <div class="btn-group" style="display: flex; gap: 5px;">
                                            <!-- Tombol Edit -->
                                            <a class="btn btn-warning btn-sm" href="{{ route('pendidikan.edit', $item->id) }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-o"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection
