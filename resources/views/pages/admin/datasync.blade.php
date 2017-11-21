@extends('layouts.dashboard')

@section('template_title')
  Showing Themes
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
                    <div class="modal"><!-- Place at bottom of page --></div>

                    <!-- <div class="load-screen" style="display: none;">
                        <div class="sk-fading-circle" style="margin-top: 10px;">
                            <div class="sk-circle1 sk-circle"></div>
                            <div class="sk-circle2 sk-circle"></div>
                            <div class="sk-circle3 sk-circle"></div>
                            <div class="sk-circle4 sk-circle"></div>
                            <div class="sk-circle5 sk-circle"></div>
                            <div class="sk-circle6 sk-circle"></div>
                            <div class="sk-circle7 sk-circle"></div>
                            <div class="sk-circle8 sk-circle"></div>
                            <div class="sk-circle9 sk-circle"></div>
                            <div class="sk-circle10 sk-circle"></div>
                            <div class="sk-circle11 sk-circle"></div>
                            <div class="sk-circle12 sk-circle"></div>
                          </div>
                    </div> -->
                </div>
                <div class="itemBox" vertical="" layout="" center="" style="margin-bottom: 10px;">
                    <button itemprop="item" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white factes" style="width: 140px;">
                        <i class="mdl-color-text--blue-white-400 material-icons">import_contacts</i> Facets
                    </button>
                </div>
                <div class="itemBox" vertical="" layout="" center="" style="margin-bottom: 10px;">
                    <button itemprop="item" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white resources" style="width: 140px;">
                        <i class="mdl-color-text--blue-white-400 material-icons">business_center</i> Resources
                    </button>
                </div>
                <div class="itemBox" vertical="" layout="" center="">
                    <button itemprop="item" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--3dp mdl-button--raised mdl-button--primary mdl-color-text--white locations" style="width: 140px;">
                        <i class="mdl-color-text--blue-white-400 material-icons dp48">place</i> Locations
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('dialogs.dialog-delete')

@endsection

@section('footer_scripts')
<style>

.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.loading {
    overflow: hidden;   
}

/* Anytime the body has the loading class, our
   modal element will be visible */
body.loading .modal {
    display: block;
}
</style>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $body = $("body");

    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
         ajaxStop: function() { $body.removeClass("loading"); }    
    });
    $( document ).ready(function() {
        $('.entity').click(function() {
            $.ajax({
                type: "GET",
                url : 'entity.php'
        });
        $('.facets').click(function() {
            $.ajax({
                type: "GET",
                url : 'facets.php'
        });
        $('.resources').click(function() {
            $.ajax({
                type: "GET",
                url : 'facets.php'
        });
        $('.location').click(function() {
            $.ajax({
                type: "GET",
                url : 'facets.php'
        });
    });

</script>

@endsection