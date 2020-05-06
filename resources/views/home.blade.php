@extends('layouts.app')

@section('content')
<home-component :premier="{{json_encode($estrenos)}}" :recommended="{{json_encode($recomendado)}}" :recommendedslider="{{json_encode($recomendado_slider)}}"></home-component>
@endsection
