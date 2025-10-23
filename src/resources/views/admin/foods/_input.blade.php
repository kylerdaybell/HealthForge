<p>
    <label class="w3-label w3-text-dark-grey">Food Name</label>
    <input class="w3-input w3-border w3-round-large" type="text" name="name" value="{{ old('name', $food->name ?? '') }}"
        required>
    @error('name')
        <span class="error-message">{{ $message }}</span>
    @enderror
</p>
<p>
    <label class="w3-label w3-text-dark-grey">Brand (Optional)</label>
    <input class="w3-input w3-border w3-round-large" type="text" name="brand_name"
        value="{{ old('brand_name', $food->brand_name ?? '') }}">
</p>
<p>
    <label class="w3-label w3-text-dark-grey">UPC Code (Optional)</label>
    <input class="w3-input w3-border w3-round-large" type="text" name="upc_code"
        value="{{ old('upc_code', $food->upc_code ?? '') }}">
    @error('upc_code')
        <span class="error-message">{{ $message }}</span>
    @enderror
</p>

<div class="w3-row-padding" style="margin: 0 -8px;">
    <div class="w3-half">
        <label class="w3-label w3-text-dark-grey">Serving Size (e.g., 100)</label>
        <input class="w3-input w3-border w3-round-large" type="number" step="0.01" name="serving_size"
            value="{{ old('serving_size', $food->serving_size ?? '') }}" required>
        @error('serving_size')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="w3-half">
        <label class="w3-label w3-text-dark-grey">Serving Unit (e.g., 'g', 'ml')</label>
        <input class="w3-input w3-border w3-round-large" type="text" name="serving_unit"
            value="{{ old('serving_unit', $food->serving_unit ?? '') }}" required>
        @error('serving_unit')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>

<h4 class="w3-margin-top">Macros (per serving)</h4>
<div class="w3-row-padding" style="margin: 0 -8px;">
    <div class="w3-col s6 m3">
        <label class="w3-label w3-text-dark-grey">Calories</label>
        <input class="w3-input w3-border w3-round-large" type="number" step="0.01" name="calories"
            value="{{ old('calories', $food->calories ?? '') }}" required>
        @error('calories')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="w3-col s6 m3">
        <label class="w3-label w3-text-dark-grey">Protein (g)</label>
        <input class="w3-input w3-border w3-round-large" type="number" step="0.01" name="protein_g"
            value="{{ old('protein_g', $food->protein_g ?? '') }}" required>
        @error('protein_g')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="w3-col s6 m3">
        <label class="w3-label w3-text-dark-grey">Carbs (g)</label>
        <input class="w3-input w3-border w3-round-large" type="number" step="0.01" name="carbs_g"
            value="{{ old('carbs_g', $food->carbs_g ?? '') }}" required>
        @error('carbs_g')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="w3-col s6 m3">
        <label class="w3-label w3-text-dark-grey">Fats (g)</label>
        <input class="w3-input w3-border w3-round-large" type="number" step="0.01" name="fats_g"
            value="{{ old('fats_g', $food->fats_g ?? '') }}" required>
        @error('fats_g')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
