@if (session()->has('success'))
<div class="alert alert-success mx-3 mt-3">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger mx-3 mt-3">
    Maaf ada kesalahan, silahkan cek isian yang anda masukan
</div>
@endif

{{-- @if($errors->any())
<div id="error-box">
     @foreach ($errors->all() as $item)
         {{$item}}
     @endforeach
</div>
@endif --}}