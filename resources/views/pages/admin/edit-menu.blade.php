@extends('layouts.dashboard')

@section('template_title')
  Menu Edit
@endsection

@section('header')
    Menu Edit
@endsection

@php
    $enableDataTablesCount = 50;
@endphp

@section('template_fastload_css')
    .mdl-badge[data-badge]:after {
        background-color: inherit;
    }
@endsection
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <style>
     .modal-backdrop{
       z-index: 0;
     }
     .modal-dialog{
        padding-top: 100px;
     }
 </style>
@section('breadcrumbs')

    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="{{url('/')}}">
            <span itemprop="name">
                {{ trans('titles.app') }}
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
        <a itemprop="item" href="/datasync" class="">
            <span itemprop="name">
                Datasync
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>

@endsection

@section('content')
    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text logo-style">
                Menu Edit
            </h2>
            <!-- <p data-placement="top" data-toggle="tooltip"><button class="btn btn-info" data-title="Create" data-toggle="modal" data-target="#create" >Create Menu</button></p> -->
        </div>
        <div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                      <h4 class="modal-title custom_align" id="Heading">Add New Menu</h4>
                    </div>
                    <div class="modal-body">
                     {!! Form::open(['url' => 'menu_create']) !!}
                      <div class="form-group">
                      <h4>Menu Label</h4>
                        <input class="form-control" name="menu_label" type="text">
                      </div>
                      <div class="form-group">
                        <h4>Menu Link</h4>
                       <input class="form-control" name="menu_link" type="text">
                      </div>
                    </div>
                    <div class="modal-footer ">
                      <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Create">
                    </div>
                   {!! Form::close() !!}
                  </div>
                  <!-- /.modal-content --> 
                </div>
                    <!-- /.modal-dialog --> 
            </div>
            <div class="table-responsive material-table">
                <table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">No</th>
                        <th class="mdl-data-table__cell--non-numeric">Menu Label</th>
                        <th class="mdl-data-table__cell--non-numeric">Menu Link</th>

                        <th class="mdl-data-table__cell--non-numeric no-sort no-search">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{$menu->menu_id}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$menu->menu_label}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$menu->menu_link}}</td>
                                <td class="mdl-data-table__cell--non-numeric">


                                    {{-- EDIT USER ICON BUTTON --}}

                                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-title="Edit" data-toggle="modal" data-target="#edit{{$menu->menu_id}}" ><i class="material-icons mdl-color-text--orange">edit</i></button>

                                    {{-- DELETE ICON BUTTON AND FORM CALL --}}

                                    <button class="dialog-button dialiog-trigger-delete dialiog-trigger mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-title="Delete" data-toggle="modal" data-target="#delete{{$menu->menu_id}}" ><i class="material-icons mdl-color-text--red">delete</i></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            <div class="modal fade" id="edit{{$menu->menu_id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Menu</h4>
                                  </div>
                                  <div class="modal-body">
                                   {!! Form::open(['url' => 'menu_update']) !!}
                                    <div class="form-group">
                                    <h4>Menu Label</h4>
                                      <input type="hidden" name="menu_id" id="menu_id" value="{{$menu->menu_id}}">
                                      <input class="form-control" name="menu_label" type="text" value ="{{$menu->menu_label}}">
                                    </div>
                                    <div class="form-group">
                                      <h4>Menu Link</h4>
                                     <input class="form-control" name="menu_link" type="text" value ="{{$menu->menu_link}}">
                                    </div>
                                  </div>
                                  <div class="modal-footer ">
                                    <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Update">
                                  </div>
                                 {!! Form::close() !!}
                                </div>
                                <!-- /.modal-content --> 
                              </div>
                                  <!-- /.modal-dialog --> 
                            </div>
                            <div class="modal fade" id="delete{{$menu->menu_id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                            <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['url' => 'menu_delete']) !!}
                                            <div class="form-group">
                                                <h4>Are you sure you want to delete ?</h4>
                                                <input type="hidden" name="menu_id" id="menu_id" value="{{$menu->menu_id}}">
                                            </div>
                                            <div class="modal-footer ">
                                                <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Delete">
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    <!-- /.modal-content --> 
                                    </div>
                                <!-- /.modal-dialog --> 
                            </div>
                        @endforeach
                  </tbody>
                </table>
            </div>
        </div>
        <div class="mdl-card__menu">

            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Add New Menu" data-toggle="modal" data-target="#create">
                <i class="material-icons">library_add</i>
                <span class="sr-only">Add New Menu</span>
            </button>

    </div>
    </div>

    @include('dialogs.dialog-delete')

@endsection

@section('footer_scripts')
<style>
    .hidden{
        display: none;
    }
</style>


@endsection