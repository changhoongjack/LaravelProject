@extends('layouts.admin')
@section('content')




<div class="card">
    
    <div class="card-header">
        {{ trans('Feedback') }} {{ trans('Details') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">

      
        
            <tbody>
            
                 <tr>
                    <th>
                        {{ trans('Feedback ID') }}
                    </th>
                    <td>
                        {{ $feedback->FeedbackID }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Description') }}
                    </th>
                    <td>
                        {!! $feedback->Description !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Issue') }}
                    </th>
                    <td>
                        {!! $feedback->Issue !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Rating') }}
                    </th>
                    <td>
                        {!! $feedback->Rating !!}
                    </td>
                </tr>
                
                
            </tbody>
        </table>

     
        

      
    </div>
</div>


@endsection