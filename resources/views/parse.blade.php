{{-- show errors --}}
@if (count($errors) > 0)
    <div class="alert alert-danger" style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- show success --}}
@if(session('success'))
    <div class="alert alert-success" style="color: green">
        {{session('success')}}
    </div>
@endif

<form action="{{ route('parse_file') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <p><input type="file" name="file">
    <input type="submit" value="Отправить"></p>
</form>
