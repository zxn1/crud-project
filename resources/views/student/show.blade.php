@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('students.index') }}" class="btn btn-sm btn-danger">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @endif

                        <div class="mb-2">
                            <div class="form-group">
                                <p>Name: {{ $editStudent->name }}</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-group">
                                <p>Name: {{ $editStudent->gender }}</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-group">
                                <p>Phone Number: {{ $editStudent->phone_number }}</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-group">
                                <p>Matric Number: {{ $editStudent->matric_number }}</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-group">
                                <p>Address: {{ $editStudent->address }}</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-group">
                                <p>Age: {{ $editStudent->age }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection