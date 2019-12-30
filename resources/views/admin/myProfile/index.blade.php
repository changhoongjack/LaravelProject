@extends('layouts.admin')
@section('content')




<div class="card">
    
    <div class="card-header">
        {{ trans('User') }} {{ trans('Profile') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">

      
        
                    @foreach($myprofiles as  $myprofile)
                                <tr data-entry-id="{{ $myprofile->id }}">

                                <th>
                                    {{ trans('Name') }}
                                </th>
                                <td>
                                    {{ $myprofile->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('Email') }}
                                </th>
                                <td>
                                    {!! $myprofile->email !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('Gender') }}
                                </th>
                                <td>
                                    {!! $myprofile->gender !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('Date Of Birth') }}
                                </th>
                                <td>
                                    {!! $myprofile->DOB !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('Joined at') }}
                                </th>
                                <td>
                                    {!! $myprofile->created_at !!}
                                </td>
                            </tr>
                            
                     @endforeach
            </tbody>
        </table>
        
        <a class="btn btn-primary " style="margin:20px auto; text-align:right; float:right; width:100px;" href="#">
                                       Edit Profile 
                                    </a>
 

      
    </div>
</div>


@endsection