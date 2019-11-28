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
                    <th width="10">
                        {{ trans('Storybook ID') }}
                        </th>
                        <!-- <th>
                            {{ trans('ContributorID') }}
                        </th> -->
                        <th>
                            {{ trans('Title') }}
                        </th>
                        <th>
                            {{ trans('Cover') }}
                        </th>
                        <th>
                            {{ trans('Description') }}
                        </th>
                        <th>
                            {{ trans('Genre') }}
                        </th>
                        <th>
                            {{ trans('Date_of_Creation') }}
                        </th>
                        <!-- <th>
                            {{ trans('Readability') }}
                        </th> -->
                        <th>
                            {{ trans('Status') }}
                        </th>
                       

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contents as  $content)
                        <tr data-entry-id="{{ $content->storybookID }}">
                           
                            <td>
                                {{ $content->storybookID ?? '' }}
                            </td>
                            <!-- <td>
                                {{ $content->ContributorID ?? '' }}
                            </td> -->
                            <td>
                                {{ $content->storybookTitle ?? '' }}
                            </td>
                            <td >
                                <!-- ================ display image in table and onclick to zoom in to view ============= -->
                                <img src="data:image/jpg;base64, {{ base64_encode($content->storybookCover) }}" style="width:50%; height:30% ;cursor:pointer" 
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
                                {{ $content->storybookDesc ?? '' }}
                            </td>
                            <td>
                                {{ $content->storybookGenre ?? '' }}
                            </td>
                            <td>
                                {{ $content->dateOfCreation ?? '' }}
                            </td>
                            <!-- <td>
                                {{ $content->readability_lvl ?? '' }}
                            </td> -->
                            <td>
                                {{ $content->status ?? '' }}
                            </td>
                           
                            <td>
                            @can('content_show')
                                    <a class="btn btn-primary" href="{{ route('admin.Contents.show', $content->storybookID   ) }}">
                                        Mark
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



    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection