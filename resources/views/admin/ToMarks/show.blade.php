@extends('layouts.admin')
@section('content')




<div class="card">
    
    <div class="card-header">
        {{ trans('Storybook') }} {{ trans('Details') }}
    </div>

    <div class="card-body">
    <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">
                                {{ trans('PageID') }}
                                </th>
                                <th>
                                    {{ trans('Page No') }}
                                </th>
                                <th>
                                    {{ trans('Photo') }}
                                </th>
                                <th>
                                    {{ trans('Page Content') }}
                                </th>
                                <th>
                                    {{ trans('Storybook ID') }}
                                </th>
                                
                        
                    </tr>
                </thead>
                <tbody >
                    @foreach($tomarks as  $tomark)
                        <tr data-entry-id="{{ $tomark->pageID }}">
                           
                            <td >
                                {{ $tomark->pageID ?? '' }}
                            </td>
                            <td >
                                {{ $tomark->pageNo ?? '' }}
                            </td>
                            <td >
                                <!-- ================ display image in table and onclick to zoom in to view ============= -->
                                <img src="data:image/jpg;base64, {{ chunk_split(base64_encode($tomark->pagePhoto)) }}" style="width:50%; height:30% ;cursor:pointer" 
                                        onclick="onClick(this)" class="w3-hover-opacity height="100" width="100"/> 

                                        <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                                        <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                                        <div class="w3-modal-content w3-animate-zoom"> 
                                            <img id="img01" style="width:100%"> 
                                        </div>
                                        </div>
                                <!-- ==================================================================================== -->
                            <td >
                                {{ $tomark->pageContent ?? '' }}
                            </td>
                
                            <td>
                                {{ $tomark->storybookID ?? '' }}
                            </td>
                            
                          

                          

                        </tr>
                    @endforeach
                </tbody>

                
            </table>

            <form action="{{ route("admin.ToMarks.store" , $tomark->storybookID ) }}" method="POST"  >         
           
                    @csrf   
                     <div class="form-group">
                     <label for="comments">Comment:</label>
                     <textarea class="form-control" rows="5" id="comments" name="Comments"></textarea>


                    </div>

                    <div class="text-right mb-3">

                        <input name="StatusAPP" value="Approved" type="hidden">
                        <button class="btn btn-success " type="submit" name='Status' value='Approve'> Approve </button>

                        <input name="StatusREJ" value="Rejected" type="hidden">
                        <button class="btn btn-danger fa fa-close" style="width:50px" type="submit" name='Status' value='Reject'> Reject </button>
                       
                    </div>

            </form>
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