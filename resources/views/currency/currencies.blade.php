@extends('layouts.app')

@section('title', 'Currency market')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @page_header
                    @slot('header') 
                        Currency market 
                    @endslot
                @endpage_header
                <div class="card-body">
                    @if($currencies->count() > 0)
                    <ul class="list-group text-center">
                        @each('currency.currency_list', $currencies, 'currency')
                    </ul>
                    @else
                    <h3 class="text-center">No currencies</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection