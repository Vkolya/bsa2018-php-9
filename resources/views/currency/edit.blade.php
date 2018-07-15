@extends('layouts.app')

@section('title', 'Edit '.$currency->title)

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @page_header
                    @slot('header') 
                        Edit
                    @endslot
                @endpage_header
                <div class="card-body">
                    @include('currency.parts.currency_form', [
                    'action' => route('currencies.update', $currency->id),
                    'method' => 'PUT',
                    ])
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection