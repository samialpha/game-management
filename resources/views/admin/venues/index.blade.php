@extends('layouts.app')

@section('content')
    <h3 class="page-title">Venues</h3>
    
    <p>
        <a href="{{ route('admin.venues.create') }}" class="btn btn-success">Add new</a>
        
    </p>
  

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($venues) > 0 ? 'datatable' : '' }} @can('venue_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('venue_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.venues.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($venues) > 0)
                        @foreach ($venues as $venue)
                            <tr data-entry-id="{{ $venue->id }}">
                                @can('venue_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $venue->name }}</td>
                                <td>
                                    @can('venue_view')
                                    <a href="{{ route('admin.venues.show',[$venue->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('venue_edit')
                                    <a href="{{ route('admin.venues.edit',[$venue->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('venue_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.venues.destroy', $venue->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('venue_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.venues.mass_destroy') }}';
        @endcan

    </script>
@endsection