@extends('layouts.admin')
@section('content')
@can('feedback_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.Feedback.create") }}">
                {{ trans('global.add') }} Feedback
            </a>
        </div>
    </div>
@endcan
@if(Auth::user()->isAdmin())
<div class="card">
    <div class="card-header">
        {{ trans('global.product.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead class="thead-light">
                    <tr>
                        <th width="10">
                        {{ trans('FeedbackID') }}
                        </th>
                        <th>
                            {{ trans('Issues') }}
                        </th>
                        <th>
                            {{ trans('Description') }}
                        </th>
                        <th>
                            {{ trans('Rating') }}
                        </th>

                        <th>
                        
                        </th>

                        
                    </tr>
                </thead>
                    <tbody>
                        @foreach($feedbacks as $key => $feedback)
                            <tr data-entry-id="{{ $feedback->FeedbackID }}">
                               
                                <td>
                                    {{ $feedback->FeedbackID ?? '' }}
                                </td>
                                <td>
                                    {{ $feedback->Issue ?? '' }}
                                </td>
                                <td>
                                    {{ $feedback->Description ?? '' }}
                                </td>
                                <td>
                                @php $rating = 1.6; @endphp  

                                    @foreach(range(1,5) as $i)
                                        <span class="fa-stack" style="width:1em">
                                            <i class="far fa-star fa-stack-1x"></i>

                                            @if($feedback->Rating >0)
                                                @if($feedback->Rating >0.5)
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                @else
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                @endif
                                            @endif
                                            @php $feedback->Rating--; @endphp
                                        </span>
                                    @endforeach
                                </td>
                                
                    
                                <td>
                                    @can('feedback_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.Feedback.show', $feedback->FeedbackID) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('feedback_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.Feedback.edit', $feedback->FeedbackID) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    <!-- @can('feedback_delete')
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan -->
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@section('scripts')
@parent
<script>
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