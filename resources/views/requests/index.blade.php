@extends('layouts.app')
@section('content')
<div class="row mb-2">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("requests.create") }}">
            Add Request
        </a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Requests List</h5>
    </div>

        <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Request Number
                        </th>
                        <th>
                            Request Date
                        </th>
                        <th>
                            Items SubGroup  
                        </th>
                        <th>
                            Items
                        </th>
                        <th>
                            Piroirty
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prrequests as $key => $prrequest)
                        <tr class="justify-content-center" data-entry-id="{{ $prrequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $prrequest->request_number ?? '' }}
                            </td>
                            <td>
                                {{ $prrequest->date}}</td>
                            <td>
                                <ul>
                                @foreach($prrequest->requestitems as $key => $item)
                                    {{ $item->subgroup }}<br>
                                @endforeach
                                </ul>
                            </td>
                            <td>
                                @foreach($prrequest->requestitems as $key => $item)
                                    {{$item->item}}<br> 
                                @endforeach
                            </td>
                            <td>
                                @foreach($prrequest->requestitems as $key => $item)
                                    {{$item->piroirty}}
                                    <br>
                                @endforeach  
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('requests.show', $prrequest->id) }}">
                                    view
                                </a>
                                <a class="btn btn-sm btn-info" href="{{ route('requests.edit', $prrequest->id) }}">
                                    edit
                                </a>
                                <form action="{{ route('requests.destroy', $prrequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orders.massDestroy') }}",
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
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection