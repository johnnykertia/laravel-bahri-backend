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
                    <form action="{{ route('doctors.update', $doctor) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('doctor_name')
                                is-invalid
                            @enderror"
                                    name="doctor_name" value="{{ $doctor->doctor_name }}">
                                @error('doctor_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Specialist</label>
                                <input type="text"
                                    class="form-control @error('doctor_specialist')
                                is-invalid
                            @enderror"
                                    name="doctor_specialist" value="{{ $doctor->doctor_specialist }}">
                                @error('doctor_specialist')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="tel"
                                    class="form-control @error('doctor_phone')
                                is-invalid
                            @enderror"
                                    name="doctor_phone" value="{{ $doctor->doctor_phone }}">
                                @error('doctor_phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control @error('doctor_email')
                                is-invalid
                            @enderror"
                                    name="doctor_email" value="{{ $doctor->doctor_email }}">
                                @error('doctor_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Sip</label>
                                <input type="number"
                                    class="form-control @error('sip')
                                is-invalid
                            @enderror"
                                    name="sip" value="{{ $doctor->sip }}">
                                @error('sip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ID IHS</label>
                                <input type="number"
                                    class="form-control @error('id_ihs')
                                is-invalid
                            @enderror"
                                    name="id_ihs" value="{{ $doctor->id_ihs }}">
                                @error('id_ihs')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NIK</label>
                                <input type="number"
                                    class="form-control @error('nik')
                                is-invalid
                            @enderror"
                                    name="nik" value="{{ $doctor->nik }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
