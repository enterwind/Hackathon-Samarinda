@extends('epanel.layouts.main')

@section('title')
    Ubah Informasi FAQ 
@stop

@section('mFaq') active @stop

@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/lib/summernote/summernote.css') }}"/>
@stop

@section('js')
<script src="{{ asset('backend/js/lib/summernote/summernote.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 100
        });
    });
</script>
@stop

@section('content')
    <section class="box-typical">

        {!! Form::model($edit, ['route' => ['epanel.faq.update', $edit->id], 'autocomplete' => 'off', 'method' => 'put']) !!}

            @include('epanel.layouts.components.top', [
                'judul' => 'Buat Baru',
                'subjudul' => 'FAQ (Frequently Ask & Question)',
                'kembali' => route('epanel.faq.index')
            ])

            @include('epanel.modules.faq.form')

            @include('epanel.layouts.components.submit')
            
        {!! Form::close() !!}

    </section>
@stop