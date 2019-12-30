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
        Storybook {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive ">
            <table class=" table table-bordered table-striped table-hover datatable ">
                <thead class="thead-light">
                    <tr>
                    <th width="135">
                        {{ trans('Storybook ID') }}
                        </th>
                        <!-- <th>
                            {{ trans('ContributorID') }}
                        </th> -->
                        <th width="250">
                            {{ trans('Title') }}
                        </th>
                        <th width="550">
                            {{ trans('Cover') }}
                        </th>
                        
                        <th width="250">
                            {{ trans('Genre') }}
                        </th>
                     
                     
                        <th>
                            {{ trans('Language Code') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($languages as $language)
                        <tr>
                           
                            <td>
                                {{ $language->storybookID ?? '' }}
                            </td>
                            <td>
                                {{ $language->storybookTitle ?? '' }}
                            </td>
                            <td  >
                                              <!-- ================ display image in table and onclick to zoom in to view ============= -->
                                              <img src="data:image/jpg;base64, {{ ($language->storybookCover) }}" style="width:512; height:512 ;cursor:pointer" 
                                        onclick="onClick(this)" class="w3-hover-opacity height="100" width="100"/>

                                        <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                                        <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                                        <div class="w3-modal-content w3-animate-zoom"> 
                                            <img id="img01" style="width:100%"> 
                                        </div>
                                        </div>
                                <!-- ==================================================================================== -->
                                </td>
                          
                            <td>
                                {{ $language->storybookGenre ?? '' }}
                            </td>

                         

                            <td>
                                {{ $language->languageCode ?? '' }}
                            </td>
                           
                            <td>
                            
                                <a class="btn btn-primary" href="{{ route('admin.ToMarks.show', $language->languageCode)}}">
                                        Review
                                    </a>
                                    
                                </br>
                                </br>

                                <a class="btn btn-primary" href="{{ route('admin.Contents.show', $language->languageCode)}}">
                                        Show Details
                                    </a>
                              
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