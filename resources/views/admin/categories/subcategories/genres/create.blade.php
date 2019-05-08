@extends('layouts.adminator.master')

@section('title', tr('add_genre'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> <span style="color:#1d880c !important">{{$subcategory->name}} </span> - {{tr('add_genre') }} class="list-inline-item"</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.categories')}}"><i class="fa fa-suitcase"></i>{{tr('categories')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.sub_categories', array('category' => $subcategory->category_id))}}"><i class="fa fa-suitcase"></i> {{tr('sub_categories')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.genres' , array('sub_category' => $subcategory->id))}}"><i class="fa fa-suitcase"></i> {{tr('genres')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-suitcase"></i> {{tr('add_genre')}}</li>
@endsection

@section('content')

@include('admin.categories.subcategories.genres._form')

@endsection
