@extends('layouts.layout')
@section('one_page_js')
    <script src="{{ asset('assets/js/quill.js') }}"></script>
@endsection
@section('one_page_css')
    <link href="{{ asset('assets/css/quill.snow.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('currency.index') }}">{{ __('Currency List') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Edit Currency') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @include('partials.success')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Edit Currency') }}</h3>
                </div>
                <div class="card-body">
                    <form class="form-material form-horizontal" action="{{ route('currency.update', $data) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ encrypt($data->id) }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }} <b class="apexdent-crimson">*</b></label>
                                    <div class="form-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-money-check-alt"></i>
                                        </div>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Enter Currency Name') }}" value="{{ old('name',$data->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">{{ __('Code') }} <b class="apexdent-crimson">*</b></label>
                                    <div class="form-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                                        </div>
                                        <select class="form-control @error('code') is-invalid @enderror" required="required" id="code" name="code">
                                            <option value="">- {{ __('Select Currency Code') }} -</option>
                                            @foreach($currencies as $key=> $value)
                                                <option value="{{ $key }}" {{ old('code', $data->code) == $key ? 'selected' : '' }}>{{ $key }}</option>
                                            @endforeach
                                        </select>
                                        @error('code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rate">{{ __('Rate') }} <b class="apexdent-crimson">*</b></label>
                                    <div class="form-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-greater-than-equal"></i></span>
                                        </div>
                                        <input type="number" id="rate" name="rate" class="form-control @error('rate') is-invalid @enderror" placeholder="{{ __('Enter Currency Rate') }}" value="{{ old('rate',$data->rate) }}" required>
                                        @error('rate')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precision">{{ __('Precision') }} <b class="apexdent-crimson">*</b></label>
                                    <div class="form-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-bullseye"></i></span>
                                        </div>
                                        <input type="number" name="precision" class="form-control @error('precision') is-invalid @enderror" placeholder="{{ __('Enter Precision') }}" value="{{ old('precision',$data->precision) }}" required>
                                        @error('precision')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="symbol">{{ __('Symbol') }} <b class="apexdent-crimson">*</b></label>
                                    <div class="form-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                        </div>
                                        <input class="form-control @error('symbol') is-invalid @enderror" value="{{ old('symbol',$data->symbol) }}" placeholder="{{ __('Enter Symbol') }}" required="required" name="symbol" type="text" id="symbol">
                                        @error('symbol')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="symbol_first">{{ __('Symbol Position') }} <b class="apexdent-crimson">*</b></label>
                                    <div class="form-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-crosshairs"></i></span>
                                        </div>
                                        <select class="form-control @error('symbol_first') is-invalid @enderror" required="required" id="symbol_first" name="symbol_first">
                                            <option value="1" {{ old('symbol_first', $data->symbol_first) == 1 ? 'selected' : '' }}>{{ __('Before Amount') }}</option>
                                            <option value="0" {{ old('symbol_first', $data->symbol_first) == 0 ? 'selected' : '' }}>{{ __('After Amount') }}</option>
                                        </select>
                                        @error('symbol_first')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="decimal_mark">{{ __('Decimal Mark') }} <b class="apexdent-crimson">*</b></label>
                                    <div class="form-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-columns"></i></span>
                                        </div>
                                        <input class="form-control @error('decimal_mark') is-invalid @enderror" placeholder="{{ __('Enter Decimal Mark') }}" required="required" name="decimal_mark" type="text" id="decimal_mark" value="{{ old('decimal_mark',$data->decimal_mark) }}">
                                        @error('decimal_mark')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thousands_separator">{{ __('Thousands Separator') }} <b class="apexdent-crimson">*</b></label>
                                    <div class="form-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-columns"></i></span>
                                        </div>
                                        <input class="form-control @error('thousands_separator') is-invalid @enderror" placeholder="{{ __('Enter Thousands Separator') }}" name="thousands_separator" type="text" id="thousands_separator" value="{{ old('thousands_separator',$data->thousands_separator) }}" required>
                                        @error('thousands_separator')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="enabled">{{ __('Status') }} <b class="apexdent-crimson">*</b></label>
                                    <div class="form-group input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-bell"></i></span>
                                        </div>
                                        <select class="form-control apexdent-form-loading @error('enabled') is-invalid @enderror" required="required" name="enabled" id="enabled">
                                            <option value="1" {{ old('enabled', $data->enabled) == 1 ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                            <option value="0" {{ old('enabled', $data->enabled) == 0 ? 'selected' : '' }}>{{ __('No') }}</option>
                                        </select>
                                        @error('enabled')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" value="{{ __('Submit') }}" class="btn btn-outline btn-info btn-lg"/>
                                        <a href="{{ route('currency.index') }}" class="btn btn-outline btn-warning btn-lg">{{ __('Cancel') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/custom/currency/create.js') }}"></script>
@endsection
