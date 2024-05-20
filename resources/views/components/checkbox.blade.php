@props(['name', 'id', 'value'])

<input type="checkbox" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" @auth{{ (Auth::user()->permissions & $value) == $value ? 'checked' : '' }}@endauth>



