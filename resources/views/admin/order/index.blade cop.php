@extends('layouts.master')

@section('content')
    <form action="{{ route('admin.order.store') }}" method="post">
        @csrf
        <div id="name-group" class="form-group">
            <label for="name">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              placeholder="Full Name"
            />
          </div>

          <div id="email-group" class="form-group">
            <label for="email">Email</label>
            <input
              type="text"
              class="form-control"
              id="email"
              name="email"
              placeholder="email@example.com"
            />
          </div>

          <div id="superhero-group" class="form-group">
            <label for="superheroAlias">Superhero Alias</label>
            <input
              type="text"
              class="form-control"
              id="superheroAlias"
              name="superheroAlias"
              placeholder="Ant Man, Wonder Woman, Black Panther, Superman, Black Widow"
            />
          </div>

          <button type="submit" class="btn btn-success">
            Submit
          </button>
    </form>
@endsection

<!-- @push('skrip')
   <script type="text/javascript">
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $(document).ready(function () {
    $("form").submit(function (event) {
        var formData = {
        name: $("#name").val(),
        email: $("#email").val(),
        superheroAlias: $("#superheroAlias").val(),
        };

        $.ajax({
        type: "POST",
        url: "{{ route('admin.order.store') }}",
        data: formData,
        dataType: "json",
        encode: true,
        }).done(function (data) {
        console.log(data);
        });

        event.preventDefault();


    });
    });
    </script>
@endpush -->

