@extends('layouts.app')

@section('title', 'Edit Doctor')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Doctor</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Doctor</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctor</h2>



                <div class="card">
                    <form action="{{ route('doctors-schedule.update', $doctorSchedule) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {{-- <label></label>
                                <input type="text"
                                    class="form-control @error('doctor_name')
                                is-invalid
                            @enderror"
                                    name="doctor_name" value="{{ $doctors->doctor_id }}">
                                @error('doctor_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror --}}

                                <select class="form-control selectric @error('doctor_id') is-invalid @enderror"
                                    name="doctor_id">
                                    <label>Doctor</label>
                                    @if($doctors) {
                                        <option value="{{ $doctors->id }}">{{ $doctors->doctor_name }}</option>
                                    }
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jadwal Senin</label>
                                <input type="text" class="form-control" name="senin"
                                    value="{{ $doctorSchedule->senin }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Selasa</label>
                                <input type="text" class="form-control" name="selasa"
                                    value="{{ $doctorSchedule->selasa }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Rabu</label>
                                <input type="text" class="form-control"
                                    name="rabu"value="{{ $doctorSchedule->rabu }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Kamis</label>
                                <input type="text" class="form-control" name="kamis"
                                    value="{{ $doctorSchedule->kamis }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Jumat</label>
                                <input type="text" class="form-control" name="jumat"
                                    value="{{ $doctorSchedule->jumat }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Sabtu</label>
                                <input type="text" class="form-control" name="sabtu"
                                    value="{{ $doctorSchedule->sabtu }}">
                            </div>
                            <div class="form-group">
                                <label>Jadwal Minggu</label>
                                <input type="text" class="form-control" name="minggu"
                                    value="{{ $doctorSchedule->minggu }}">
                            </div>

                            <div class="form-group">
                                <label>Note</label>
                                <textarea name="note" class="form-control"></textarea>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush


{{--
                            <div class="form-group">
                                <label for="">Photo</label>
                                <div id="photo" class="photo">
                                    <label for="photo" id="photo">Choose File</label>
                                    <input type="file" name="photo" id="photo" value="{{ $doctors->photo }}">
                                </div>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
