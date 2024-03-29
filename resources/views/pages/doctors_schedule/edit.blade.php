@extends('layouts.app')

@section('title', 'Edit Doctor Schedule')

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
                    <div class="breadcrumb-item">Doctor Schedule</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctor Schedule</h2>



                <div class="card">
                    <form action="{{ route('doctors-schedule.update', $doctorSchedule, $doctors) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Doctor</label>
                                <select class="form-control selectric @error('doctor_id') is-invalid @enderror"
                                    name="doctor_id">
                                    <option value="">Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($doctorSchedule->doctor_id)
                                <label>Jadwal Senin</label>
                                <input type="text" class="form-control" name="senin"
                                    value="{{ $doctorSchedule->senin }}">
                            @elseif($doctorSchedule->doctor_id)
                                <label>Jadwal Selasa</label>
                                <input type="text" class="form-control" name="selasa"
                                    value="{{ $doctorSchedule->selasa }}">
                            @elseif($doctorSchedule)
                                <label>Jadwal Rabu</label>
                                <input type="text" class="form-control" name="rabu"
                                    value="{{ $doctorSchedule->rabu }}">
                            @elseif($doctorSchedule)
                                <label>Jadwal Kamis</label>
                                <input type="text" class="form-control" name="kamis"
                                    value="{{ $doctorSchedule->kamis }}">
                            @elseif($doctorSchedule)
                                <label>Jadwal Jumat</label>
                                <input type="text" class="form-control" name="jumat"
                                    value="{{ $doctorSchedule->jumat }}">
                            @elseif($doctorSchedule)
                                <label>Jadwal Sabtu</label>
                                <input type="text" class="form-control" name="sabtu"
                                    value="{{ $doctorSchedule->sabtu }}">
                            @elseif($doctorSchedule)
                                <label>Jadwal Minggu</label>
                                <input type="text" class="form-control" name="minggu"
                                    value="{{ $doctorSchedule->minggu }}">
                            @else
                                <p>Ga Ada Jadwal nya Kaka Cantik</p>
                            @endif

                            {{-- <div class="form-group">
                                <label>Note</label>
                                <textarea name="note" class="form-control" value="{{ $doctors->note }}"></textarea>
                            </div> --}}
                        </div>

                </div>
                <div class="card-footer">
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



{{-- <div class="form-group">
                                <label>Photo</label>
                                <div class="col-sm-9">
                                    <input type="file"
                                        class="form-control @error('photo')
                                        is-invalid
                                        @enderror"
                                        name="photo">
                                </div>
                                @error('photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
