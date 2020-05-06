@extends('layouts.app')

@section('content')
<search-component search="{{$search}}" :categories="{{json_encode($categories)}}"></search-component>
@endsection