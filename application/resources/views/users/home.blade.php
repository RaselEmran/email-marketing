@extends('app')

@section('main-content')
    <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs">
            <li @if ($errors->has() || isset($userInfo)) class="" @else class="active" @endif ><a href="#all_users"
                                                                                                  data-toggle="tab">All
                    Users</a></li>
            @if(Auth::user()->role == 'admin' || (isset($userInfo) && ($userInfo->id == Auth::id())))
                <li @if ($errors->has() || isset($userInfo)) class="active" @else class="" @endif ><a href="#manage_users"
                                                                                                  data-toggle="tab">{{ $title }}</a>
                </li>
            @endif
        </ul>
        <div class="tab-content no-padding">
            <!-- ************** general *************-->
            <div @if ($errors->has() || isset($userInfo)) class="tab-pane" @else class="tab-pane active"
                 @endif id="all_users">

                <table class="table table-hover" id="dataTables">
                    <thead>
                    <tr class="active">
                        <th class="col-sm-1">#</th>
                        <th>{!! trans('common.name') !!}</th>
                        <th>{!! trans('common.email') !!}</th>
                        <th>{!! trans('common.role') !!}</th>
                        <th>{!! trans('common.status') !!}</th>
                        <th>{!! trans('common.action') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($allUsers) > 0)
                        @foreach($allUsers as $key =>$user)
                            <tr>
                                <td><a href="{{ url('profile/'.$user->id) }}">{!! $key+1 !!}</a></td>
                                <td><i class="fa fa-{{ $user->platform }}"></i> <a href="{{ url('profile/'.$user->id) }}">{!! $user->name !!}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role == 'admin')
                                        <span class="label label-warning">Admin</span>
                                    @else
                                        <span class="label label-info">User</span>
                                    @endif
                                </td>
                                <td><span @if($user->status == 'Active') class="label label-success"
                                          @elseif($user->status == 'Banned') class="label label-danger"
                                          @endif> <a style="color: white;" href="{{ url("users/change_status/$user->id") }}">{{ $user->status }}</a> </span>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'class' => 'delete-form']) !!}
                                    @if($user->status == 'Active')
                                        {!! btn_banned(url("users/change_status/$user->id")) !!}
                                    @elseif($user->status == 'Banned')
                                        {!! btn_active(url("users/change_status/$user->id")) !!}
                                    @endif
                                        {!! btn_edit("users/$user->id/edit") !!}
                                        @if($user->role != 'admin')
                                        {!! btn_delete_submit() !!}
                                        @endif
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div @if ($errors->has() || isset($userInfo)) class="tab-pane active" @else class="tab-pane"
                 @endif id="manage_users">
                @if( !isset($userInfo) )
                    @if(Auth::user()->role == 'admin')
                        {!! Form::open(['url' => "users",'id'=>'client','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}

                        @include('users._form',['submit_button' => 'Submit'])

                        {!! Form::close() !!}
                    @endif
                @else
                    {!! Form::model($userInfo,['method' =>'PUT', 'url' => ["users",$userInfo->id],'id'=>'users','class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files' => true]) !!}

                    @include('users._form',['submit_button' => 'Update'])

                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
@endsection