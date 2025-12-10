@csrf

<div>
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}">

    @error('name')
    <div>{{ $message }}</div>
    @enderror
</div>

<div>
    <label>Brand</label>
    <select name="brand_id">
        <option value="">-- Choose a brand --</option>
        @foreach ($brands as $brand)
            <option
                value="{{ $brand->id }}"
                @selected(old('brand_id', $product->brand_id ?? '') === $brand->id)
            >
                {{ $brand->name }}
            </option>
        @endforeach
    </select>

    @error('brand_id')
    <div>{{ $message }}</div>
    @enderror
</div>

<div>
    <label>Description</label>
    <textarea name="description">{{ old('description', $product->description ?? '') }}</textarea>

    @error('description')
    <div>{{ $message }}</div>
    @enderror
</div>

<div>
    <label>Price</label>
    <input type="number" step="0.01" name="price"
           value="{{ old('price', $product->price ?? '') }}">

    @error('price')
    <div>{{ $message }}</div>
    @enderror
</div>

<button type="submit">
    {{ $submitLabel ?? 'Save' }}
</button>
