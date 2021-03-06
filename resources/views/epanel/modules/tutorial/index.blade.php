@extends('epanel.layouts.main')

@section('title')
    Module Tutorial
@stop

@section('mTutorial') active @stop

@section('js')  
    <script src="{{ asset('backend/js/lib/datatables-net/datatables.min.js') }}"></script>
    <script>
        $(function() {
            $('#datatable').DataTable();
        });
    </script>
@stop

@section('css')
    @include('epanel.layouts.partials.datatables')
@stop

@section('content')
    @if(!$data->count())

        @include('epanel.layouts.components.kosong', [
            'icon' => 'font-icon font-icon-event',
            'judul' => 'Module Tutorial',
            'subjudul' => 'Sepertinya Anda belum memiliki Tutorial.', 
            'tambah' => route('epanel.tutorial.create')
        ])

    @else
        
        {!! Form::open(['method' => 'delete', 'route' => ['epanel.tutorial.destroy', 'hapus-all'], 'id' => 'submit-all']) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Module',
                'subjudul' => 'Tutorial',
                'tambah' => route('epanel.tutorial.create'), 
                'hapus' => true
            ])

            <div class="card">
                <div class="card-block">
                    <table id="datatable" class="display table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="table-check">
                                    <div class="checkbox checkbox-only">
                                        <input type="checkbox" id="check-all">
                                        <label for="check-all"></label>
                                    </div>
                                </th>
                                <th width="25%">LABEL</th>
                                <th>YOUTUBE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tables">
                        @foreach($data as $i => $temp)
                            <tr>
                                <td class="table-check">
                                    <span>
                                        <div class="checkbox checkbox-only">
                                            <input type="checkbox" id="pilihan[{{$i}}]" name="pilihan[]" value="{!! $temp->id !!}">
                                            <label for="pilihan[{{$i}}]"></label>
                                        </div>
                                    </span>
                                </td>
                                <td>
                                    {!! $temp->label !!}
                                </td>
                                <td>
                                    <a href="{!! $temp->video_url !!}" target="_blank">{!! $temp->video_url !!}</a>
                                </td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <div class="btn-toolbar">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('epanel.tutorial.edit', $temp->id) }}" role="button" 
                                                class="btn btn-sm btn-primary" style="float:none;">
                                                <span class="font-icon font-icon-pencil"></span>
                                            </a>
                                            <button onclick="javascript:deleteModal('{!!$temp->id!!}')" type="button" 
                                                class="btn btn-sm btn-danger" style="float: none;">
                                                <span class="font-icon font-icon-trash"></span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        {!! Form::close() !!}
    @endif
@endsection