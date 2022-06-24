@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex">
                        {{ __('QR Builder') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-8">
                                <form method="post" action="{{ route('builder') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <input type="text" name="body" value="{{ old('body') }}" class="form-control">
                                        @error('body')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary">
                                            Generate QR Code
                                        </button>
                                    </div>

                                </form>
                            </div>
                            <div class="col-4">
                                @if (session('code'))
                                    <img src="{{ asset('qr_code/' . session('code')) }}" alt="{{ session('code') }}" class="img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
