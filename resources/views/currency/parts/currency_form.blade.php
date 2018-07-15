<form action="{{ $action }}" method="POST" class="currency-form">
    @csrf
    @isset ($method)
        @if (in_array($method, ['PUT', 'PATCH', 'DELETE'], true))
             <input name="_method" type="hidden" value="{{ $method }}">
        @endif
    @endisset
    <div class="form-group">
        <label for="title_input">Title</label>
        <input type="text" class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}" id="title_input" name="title"  value="{{ old('title', $currency['title'] ?? null) }}" placeholder="Enter title">
        @if ($errors->has('title'))
            <span class="text-danger">{{ $errors->first('title')  }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="short_name_input">Short name</label>
        <input type="text" class="form-control {{ $errors->first('short_name') ? 'is-invalid' : '' }}" id="short_name_input" name="short_name"  value="{{ old('short_name', $currency['short_name'] ?? null) }}" placeholder="Enter short name">
        @if ($errors->has('short_name'))
            <span class="text-danger">{{ $errors->first('short_name')  }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="logo_url_input">Image url</label>
        <input type="text" class="form-control {{ $errors->first('logo_url') ? 'is-invalid' : '' }}"  id="logo_url_input" name="logo_url"  value="{{ old('logo_url', $currency['logo_url'] ?? null) }}" placeholder="Enter image url">
        @if ($errors->has('logo_url'))
            <span class="text-danger">{{ $errors->first('logo_url')  }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="price_input">Цена (USD)</label>
        <input type="text" class="form-control {{ $errors->first('price') ? 'is-invalid' : '' }}"  id="price_input" name="price"  value="{{ old('price', $currency['price'] ?? null) }}" placeholder="Enter price">
        @if ($errors->has('price'))
            <span class="text-danger">{{ $errors->first('price')  }}</span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary float-right">Save</button>
</form>