@extends('layouts.app')

@section('title', 'Create currency')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @page_header
                    @slot('header') 
                        Add a new currency
                    @endslot
                @endpage_header
                <div class="card-body">
                    @include('currency.parts.currency_form', [
                    'action' => route('currencies.store'),
                    ])
                </div>
            </div>
        </div>
    </div>
</div>

@endsection