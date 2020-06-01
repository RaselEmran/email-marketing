@extends('layouts.app')

@section('main-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2 col-xs-12" style="margin-top: 20px">
        <table class="table table-bordered table-striped">
            <thead><h3  class="text-center text-info">{{ ucwords(Auth::user()->name) }}'s Profile</h3></thead>
            <tr>
                <th>Name</th>
                <td><a href="#" class="profile_editable" data-type="text" data-mode="inline" data-name="name" rel="<?php echo csrf_token(); ?>" data-pk="<?php echo $user->_id; ?>" data-url="/profile_update/<?php echo $user->_id; ?>"><?php echo $user->name; ?></a></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><a href="#" class="profile_editable" data-type="email" data-mode="inline" data-name="email" rel="<?php echo csrf_token(); ?>" data-pk="<?php echo $user->_id; ?>" data-url="/profile_update/<?php echo $user->_id; ?>"><?php echo $user->email; ?></a></td>
            </tr>
            <tr>
                <th>Photo</th>
                <td>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="/profile_update/{{$user->_id}}" method='post' role="form" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label for="photo">Upload New Photo</label>
                            <input type="file" name="photo" id="photo"><br>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        @if(!empty(@$user->photo))
                            <img class="img-thumbnail" alt="{{$user->name}}'s photo" src="/user_img/{{$user->photo}}" height="150" width="150">
                        @else
                            <img class="img-thumbnail" alt="{{$user->name}}'s photo" src="/img/logo.png" height="150" width="150">
                        @endif
                    </div>
                </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<script>
    $('.profile_editable').editable({
        params: function (params) {
            params._token = $(this).attr('rel');
            return params;
        },
        ajaxOptions: {
            success: function (data) {
                alert(data);
                window.location.assign("/profile");
            }
        }
    });
</script>
@endsection