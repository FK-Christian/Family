@extends('layouts.family')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Family</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{!! route('family.create') !!}">
                <i class="fa fa-plus"></i>
                Add New
            </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('family.table')
            </div>
        </div>
    </div>
@endsection



