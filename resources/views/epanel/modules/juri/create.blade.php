@extends('epanel.layouts.main')

@section('title')
    Buat Juri Baru
@stop

@section('mJuri') active @stop

@section('css')
@stop

@section('js')
@stop

@section('content')
    <section class="box-typical">

        {!! Form::open(['route' => 'epanel.juri.store', 'autocomplete' => 'off', 'files' => true]) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Buat Baru',
                'subjudul' => 'Juri',
                'kembali' => route('epanel.juri.index')
            ])

            @include('epanel.modules.juri.form')

            @include('epanel.layouts.components.submit')
            
        {!! Form::close() !!}

    </section>
@stop