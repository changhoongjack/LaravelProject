@extends('layouts.admin')
@section('content')
<!-- @can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.products.create") }}">
                {{ trans('global.add') }} {{ trans('global.product.title_singular') }}
            </a>
        </div>
    </div>
@endcan -->



<div class="card">
    <div class="card-header">
        Pending Storybooks
    </div>

    <div class="card-body">
        <div class="table-responsive ">
            <table class=" table table-bordered table-striped table-hover datatable " >
                <thead class="thead-light">
                    <tr>
                        <th width="350">
                        {{ trans('Storybook ID') }}
                        </th>

                        <th>
                        {{ trans('Cover') }}
                        </th>
                        
                        <th width="250">
                        {{ trans('Genre') }}
                        </th>


                        <!-- <th>
                            {{ trans('ContributorID') }}
                        </th> -->
                        <!-- <th width="980">
                            {{ trans('Title') }}  
                        </th> -->
                     
                      
                        <!-- <th>
                            {{ trans('Date Created')}}
                        </th> -->
                        <!-- <th>
                            {{ trans('Readability') }}
                        </th> -->
                        <!-- <th width="250" >
                            {{ trans('Status') }}
                        </th> -->
                     

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contents as  $content)
                        <tr>
                           
                            <td>
                                {{ $content->storybookID ?? '' }}
                            </td>

                            <td >
                                      <!-- ================ display image in table and onclick to zoom in to view ============= -->
                                      <img src="data:image/jpg;base64, {{ ($content->storybookCover) }}" style="width:512; height:512 ;cursor:pointer" 
                                        onclick="onClick(this)" class="w3-hover-opacity height="100" width="100"/>

                                        <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                                        <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                                        <div class="w3-modal-content w3-animate-zoom"> 
                                            <img id="img01" style="width:100%"> 
                                        </div>
                                        </div>
                                <!-- ==================================================================================== -->

                            <td>
                                {{ $content->storybookGenre ?? '' }}
                            </td>
                            <!-- <td>
                                {{ $content->ContributorID ?? '' }}
                            </td>
                            <td>
                                {{ $content->storybookTitle ?? '' }}
                            </td> -->
                            
                           
                          
                            <!-- <td>
                                {{ $content->dateOfCreation ?? '' }}
                            </td> -->
                            <!-- <td>
                                {{ $content->readability_lvl ?? '' }}
                            </td> -->
                            <!-- <td>
                                {{ $content->status ?? '' }}
                            </td> -->

                         
                           
                            <td width="100">
                            @can('content_show')
                                    
                                    <a class="btn btn-primary" href="{{ route('admin.languageAvailability.show', $content->storybookID)}}">
                                        Review
                                    </a>
                                @endcan
                             
                              
                            </td>
                         

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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