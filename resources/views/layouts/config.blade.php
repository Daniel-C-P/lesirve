@extends('layouts.app2')

@section('content')

<div class="form-group">
    {{ Form::label('facebook') }}
    {{ Form::text('facebook', $conf->facebook, ['class' => 'form-control' . ($errors->has('facebook') ? ' is-invalid' : ''), 'placeholder' => 'Facebook']) }}
    {!! $errors->first('facebook', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('twitter') }}
    {{ Form::text('twitter', $conf->twitter, ['class' => 'form-control' . ($errors->has('twitter') ? ' is-invalid' : ''), 'placeholder' => 'Twitter']) }}
    {!! $errors->first('twitter', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('whatsapp') }}
    {{ Form::text('whatsapp', $conf->whatsapp, ['class' => 'form-control' . ($errors->has('whatsapp') ? ' is-invalid' : ''), 'placeholder' => 'Whatsapp']) }}
    {!! $errors->first('whatsapp', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('instagram') }}
    {{ Form::text('instagram', $conf->instagram, ['class' => 'form-control' . ($errors->has('instagram') ? ' is-invalid' : ''), 'placeholder' => 'Instagram']) }}
    {!! $errors->first('instagram', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('youtube') }}
    {{ Form::text('youtube', $conf->youtube, ['class' => 'form-control' . ($errors->has('youtube') ? ' is-invalid' : ''), 'placeholder' => 'Youtube']) }}
    {!! $errors->first('youtube', '<div class="invalid-feedback">:message</div>') !!}
</div>

@endsection
