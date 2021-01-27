@extends('layouts.app')

@section('content')
<div class="container">
    <post-form-component :post="{{ $post }}"></post-form-component>
</div>
@endsection