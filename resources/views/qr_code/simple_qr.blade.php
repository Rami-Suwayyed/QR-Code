@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex">
                        {{ __('QR Builder') }}
                        <div class="ml-auto">
{{--                            <a href="{{ route('index') }}">QR Index</a> ---}}
                            <a href="{{ route('qr_builder') }}">QR Advanced</a> -
                            <a href="{{ route('qr_simple') }}">QR Simple</a> -
                            <a href="{{ route('qr_phone') }}">Phone</a> -
                            <a href="{{ route('qr_email') }}">Email</a> -
                            <a href="{{ route('qr_geo') }}">GEO</a> -
                            <a href="{{ route('qr_sms') }}">SMS</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-8">
                                <form method="post" action="{{ route('qrcode') }}">
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

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="qr_attachment">QR Attachment</label>
                                                <select name="qr_attachment" class="form-control">
                                                    <option value="no">No</option>
                                                    <option value="yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>
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
                                    @if (pathinfo(session('code'))['extension'] === 'eps')
                                        QR Code available, <a href="{{ asset('qr_code/' . session('code')) }}">click here</a> to download it.
                                    @else
                                        <img src="{{ asset('qr_code/' . session('code')) }}" alt="{{ session('code') }}"  class="img-fluid">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
