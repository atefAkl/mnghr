@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('contents')
    <h1 class="mt-3">Stores Home</h1>
    <div class="row">
        <div class="col-9">
            <div class="card my-3 mx-4">
                <div class="card-header py-2 px-3">
                    <i class="fa fa-user"></i> General
                </div>
                <div class="card-body pt-0 pb-3">
                    <div class="row">
                        <a class="col col-4 setting-item text-secondary" href="{{ route('display-stores-list') }}">
                            <div class="row mt-3">
                                <div class="item-icon" style="width: 50px">
                                    <i class="fa fa-warehouse fa-2x"></i>
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">All Stores</p>
                                    <small>List of Available Stores</small>
                                </div>
                            </div>
                        </a>

                        <a class="col col-4 setting-item text-secondary" href="{{ route('display-recepits-list') }}">
                            <div class="row pt-3">
                                <div class="item-icon">
                                    <i class="fa fa-receipt fa-2x"></i>
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">Store Receipts</p>
                                    <small>Display All Receipts</small>
                                </div>
                            </div>
                        </a>

                        <a class="col col-4 setting-item text-secondary" href="">
                            <div class="row pt-3">
                                <div class="item-icon">
                                    <i class="fa fa-users fa-2x"></i>
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">Store Admins</p>
                                    <small>Display All Store Admins</small>
                                </div>
                            </div>
                        </a>
                        <a class="col col-4 setting-item text-secondary" href="">
                            <div class="row pt-3">
                                <div class="item-icon">
                                    <i class="fa fa-map-signs fa-2x"></i>
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">Store Movements</p>
                                    <small>Display Material In / Out</small>
                                </div>
                            </div>
                        </a>

                        <a class="col col-4 setting-item text-secondary" href="">
                            <div class="row pt-3">
                                <div class="item-icon">
                                    <i class="fa fa-clipboard-list fa-2x"></i>
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">Store Reports</p>
                                    <small>Display and Customize Reports</small>
                                </div>
                            </div>
                        </a>

                        <a class="col col-4 setting-item text-secondary" href="">
                            <div class="row pt-3">
                                <div class="item-icon">
                                    <i class="fa fa-cogs fa-2x"></i>
                                </div>
                                <div class="col item-text">
                                    <p class="my-0">Settings</p>
                                    <small>Store Settings and Options</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> {{-- End of cards --}}
        <div class="col-3" style=""> {{-- Start of wedgets --}}

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(() => {
            $('.sidebar-toggle').click(() => {
                $('.sidebar').toggleClass('mini-sidebar');
                $('.sidebar-toggle').toggleClass('turn-90')
            });
        })
    </script>
@endsection
