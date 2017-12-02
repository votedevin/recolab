@extends('layouts.dashboard')

@section('template_title')
  Data Sync
@endsection

@section('header')
    Showing Themes
@endsection

@php
    $enableDataTablesCount = 50;
@endphp

@section('template_fastload_css')
    .mdl-badge[data-badge]:after {
        background-color: inherit;
    }
@endsection

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
                Data Sync
            </h2>

        </div>
        <div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-20 context">
            <h4 class="margin-bottom-0">Airtable->Mysql</h4>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                <div class="itemBox" vertical="" layout="" center="" style="margin-bottom: 10px;">
                    <button itemprop="item" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white entity" style="width: 140px;">
                        <i class="mdl-color-text--blue-white-400 material-icons">account_balance</i> Entity
                    </button>
                    <p class="result1" style="display: inline;">
                    <img class="title1 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                    </p>
                </div>
                <div class="itemBox" vertical="" layout="" center="" style="margin-bottom: 10px;">
                    <button itemprop="item" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white facets" style="width: 140px;">
                        <i class="mdl-color-text--blue-white-400 material-icons">import_contacts</i> Facets
                    </button>
                    <p class="result2" style="display: inline;">
                    <img class="title2 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                    </p>
                </div>
                <div class="itemBox" vertical="" layout="" center="" style="margin-bottom: 10px;">
                    <button itemprop="item" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white resources" style="width: 140px;">
                        <i class="mdl-color-text--blue-white-400 material-icons">business_center</i> Resources
                    </button>
                    <p class="result3" style="display: inline;">
                    <img class="title3 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                    </p>
                </div>
                <div class="itemBox" vertical="" layout="" center="">
                    <button itemprop="item" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white locations" style="width: 140px;">
                        <i class="mdl-color-text--blue-white-400 material-icons dp48">place</i> Locations
                    </button>
                    <p class="result4" style="display: inline;">
                    <img class="title4 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                    </p>
                </div>
            </div>
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
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        $('.entity').click(function() {
            $('.title1').removeClass('hidden');
            $.ajax({
                type: "GET",
                url : 'entity.php',
                success: function(result){
                $(".title1").addClass('hidden');
                $(".result1").html("Updated");
                }
            });
        });
        $('.facets').click(function() {
            $('.title2').removeClass('Updated');
            $.ajax({
                type: "GET",
                url : 'facets.php',
                success: function(result){
                $(".title2").addClass('hidden');
                $(".result2").html("Updated");
                }
            });
        });
        $('.resources').click(function() {
            $('.title3').removeClass('Updated');
            $.ajax({
                type: "GET",
                url : 'resources.php',
                success: function(result){
                $(".title3").addClass('hidden');
                $(".result3").html("Updated");
                }
            });
        });
        $('.locations').click(function() {
            $('.title4').removeClass('hidden');
            $.ajax({
                type: "GET",
                url : 'locations.php',
                success: function(result){
                $(".title4").addClass('hidden');
                $(".result4").html("Updated");
                }
            });
        });
    });
</script>

@endsection