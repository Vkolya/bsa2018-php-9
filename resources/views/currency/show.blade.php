@extends('layouts.app')

@section('title', $currency->title)

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @page_header
                    @slot('header') 
                        {{ $currency->title }}
                    @endslot
                @endpage_header
                <div class="card-body text-center">
                    <div class="text-right">
                        @can('update', App\Currency::class)
                            <a href="{{ route('currencies.edit', $currency->id) }}" class="btn btn-warning edit-button" role="button">Edit</a>
                        @endcan
                        @can('delete', App\Currency::class)
                        <form method="post" action="{{ route('currencies.destroy', $currency->id) }}" class="form-delete">
                            @csrf
                            @method('DELETE')
                                <button type="submit" title="Delete" class="btn btn-danger delete-button"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                        @endcan
                    </div>
                    <img src="{{ $currency->logo_url }}"/><b>{{ $currency->title }}</b>({{ $currency->short_name }})
                    <p><b>Цена: </b>{{ $currency->price }} USD</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection