@extends('backend.layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Tambah Pengalaman Kerja</h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('dashboard') }}">Home</a></li>
                    <li>Riwayat Hidup</li>
                    <li>Pengalaman Kerja</li>
                </ol>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Form Tambah Pengalaman Kerja</div>
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel-body">
                    <div class="form">
                        <form class="form-validate form-horizontal" id="pengalaman_kerja_form" method="POST"
                            action="{{ isset($pengalaman_kerja) ? route('pengalaman_kerja.update', $pengalaman_kerja->id) : route('pengalaman_kerja.store') }}">
                            @csrf
                            {!! isset($pengalaman_kerja) ? method_field('PUT') : '' !!}
                            <input type="hidden" name="id" value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->id : '' }}" />

                            <div class="form-group">
                                <label class="control-label col-lg-2">Nama Perusahaan <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="nama" name="nama" minlength="2" type="text"
                                        value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->nama : '' }}" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">Jabatan <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="jabatan" name="jabatan" minlength="2" type="text"
                                        value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->jabatan : '' }}" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">Tahun Masuk <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input id="tahun_masuk" type="number" name="tahun_masuk" class="form-control"
                                        value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_masuk : '' }}" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">Tahun Keluar <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input id="tahun_keluar" type="number" name="tahun_keluar" class="form-control"
                                        value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_keluar : '' }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</section>
@endsection
