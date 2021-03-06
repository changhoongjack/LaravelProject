@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.user.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.user.fields.name') }}
                    </th>
                    <td>
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.email') }}
                    </th>
                    <td>
                        {{ $user->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Gender') }}
                    </th>
                    <td>
                        {{ $user->gender }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Date of Birth') }}
                    </th>
                    <td>
                        {{ $user->DOB }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Date Joined') }}
                    </th>
                    <td>
                        {{ $user->created_at }}
                    </td>
                </tr>
                
                <tr>
                    <th>
                        Roles
                    </th>
                    <td>
                        @foreach($user->roles as $id => $roles)
                            <span class="label label-info label-many">{{ $roles->title }}</span>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection