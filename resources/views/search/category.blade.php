@extends('layouts.app')

@section('content')
<search-category-component :idcategory="{{$id_category}}" :categories="{{json_encode($categories)}}"></search-category-component>
@endsection