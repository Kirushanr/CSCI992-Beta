@extends('account.dashboard')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
     <h5 class="mb-4 text-primary">Turn on notifications, if you want to be the first person to check out what's new  </h5>
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="book" onclick="updateNotification(this)" {{$book}}>
                  </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" value="Books" disabled>
        </div>
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="electronic" onclick="updateNotification(this)" {{$electronic}}>
                  </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" value="Electronics " disabled {{$essential}}>
        </div>
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="essential" onclick="updateNotification(this)">
                  </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with checkbox" value="Essentials " disabled>
        </div>
</main>

@endsection

@section('script')
<script>
        function updateNotification(element){
            var mode= $(element).prop('checked'); 
            var attribute=$(element).attr('name');
            

            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                
                url: "/user/dashboard/notification",
                data: { type: attribute, status:mode}
            }).done(function( msg ) {
                alert("Your notification preference is updated");
                location.reload();
            });
        }
</script>
@endsection