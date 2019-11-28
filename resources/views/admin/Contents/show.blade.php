@extends('layouts.admin')
@section('content')




<div class="card">
    
    <div class="card-header">
        {{ trans('Storybook') }} {{ trans('Details') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">

      
        
            <tbody>
            
            <tr>
                    <th>
                        {{ trans('Storybook ID') }}
                    </th>
                    <td>
                        {{ $content->storybookID }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Title') }}
                    </th>
                    <td>
                        {!! $content->storybookTitle !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Cover') }}
                    </th>
                    <td >
                                <!-- ================ display image in table and onclick to zoom in to view ============= -->
                                <img src="data:image/jpg;base64, {{ chunk_split(base64_encode($content->storybookCover)) }}" style="width:30%; height:30% ;cursor:pointer" 
                                        onclick="onClick(this)" class="w3-hover-opacity height="100" width="100"/> 

                                        <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                                        <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                                        <div class="w3-modal-content w3-animate-zoom"> 
                                            <img id="img01" style="width:100%"> 
                                        </div>
                                        </div>
                                <!-- ==================================================================================== -->
                </tr>
                <tr>
                    <th>
                        {{ trans('Description') }}
                    </th>
                    <td>
                        {!! $content->storybookDesc !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Genre') }}
                    </th>
                    <td>
                        {!! $content->storybookGenre !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Date Of Creation') }}
                    </th>
                    <td>
                        {!! $content->dateOfCreation !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Contributor ID') }}
                    </th>
                    <td>
                        {!! $content->ContributorID !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Rating') }}
                    </th>
                    <td>
                        {!! $content->rating !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Language Code') }}
                    </th>
                    <td>
                        {!! $content->languageCode !!}
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('Status') }}
                    </th>
                    <td>
                        {!! $content->status !!}
                    </td>
                </tr>
                
            </tbody>
        </table>
        
        <a class="btn btn-primary " style="margin:20px auto; text-align:right; float:right; width:190px;" href="{{ route('admin.ToMarks.show' , $content->storybookID) }}">
                                        View Storybook Content  
                                    </a>
 

      
    </div>
</div>
@section('scripts')
@parent
<script>

function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";   // Modal Image using Script
}


</script>
@endsection

@endsection