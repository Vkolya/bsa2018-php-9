<li class="list-group-item">
    <img src="{{ $currency->logo_url }}"/> <a href="{{ route('currencies.show', $currency->id) }}">{{ $currency->title }}</a>({{ $currency->short_name }}) - {{ $currency->price }} USD
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
   
 </li>