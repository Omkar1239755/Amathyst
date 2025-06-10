@extends('template.layout.app')
@section('content')
<!-- block userlist main section -->
<!--<section class="editprofile-dashboard">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-md-12">-->

  <div class="row w-100 m-0">
        <main class="col-md-10 offset-md-2 px-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap setting-heding">
                    <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                        <a href="settingdasboard.html" class="btn btnarrow-link me-2">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h4 class="mb-0 editprofile-heding">Blocked Users</h4>
                    </div>
                </div>
                <div class="card blockuser-card">
                    <div class="user-block">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card smith-userblock" style="width: 18rem;">
                                    <img src="{{ asset('assests/images/blockuser.svg')}}" class="card-img-top"
                                        alt="block-user" width=50px>
                                    <div class="card-body block-content">
                                        <h5 class="card-title">Smith Jhonsom</h5>
                                        <p class="card-text"><img src="{{ asset('assests/images/gemsimg.svg')}}" alt="gems"
                                                width="20px"> Starts from 50 Gems</p>
                                        <button type="button" class="unblock-btn"
                                            data-bs-toggle="modal" data-bs-target="#unblockModal">
                                            Unblocked
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card smith-userblock" style="width: 18rem;">
                                    <img src="{{ asset('assests/images/blockuser.svg')}}" class="card-img-top"
                                        alt="block-user">
                                    <div class="card-body block-content">
                                        <h5 class="card-title">Smith Jhonsom</h5>
                                        <p class="card-text"><img src="{{ asset('assests/images/gemsimg.svg')}}" alt="gems"
                                                width="20px"> Starts from 50 Gems</p>
                                                <button type="button" class="unblock-btn"
                                                data-bs-toggle="modal" data-bs-target="#unblockModal">
                                                Unblocked
                                            </button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card smith-userblock" style="width: 18rem;">
                                    <img src="{{ asset('assests/images/blockuser.svg')}}" class="card-img-top"
                                        alt="block-user">
                                    <div class="card-body block-content">
                                        <h5 class="card-title">Smith Jhonsom</h5>
                                        <p class="card-text"><img src="{{ asset('assests/images/gemsimg.svg')}}" alt="gems"
                                                width="20px"> Starts from 50 Gems</p>
                                                <button type="button" class="unblock-btn"
                                                data-bs-toggle="modal" data-bs-target="#unblockModal">
                                                Unblocked
                                            </button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card smith-userblock" style="width: 18rem;">
                                    <img src="{{ asset('assests/images/blockuser.svg')}}" class="card-img-top"
                                        alt="block-user">
                                    <div class="card-body block-content">
                                        <h5 class="card-title">Smith Jhonsom</h5>
                                        <p class="card-text"><img src="{{ asset('assests/images/gemsimg.svg')}}" alt="gems"
                                                width="20px"> Starts from 50 Gems</p>
                                                <button type="button" class="unblock-btn"
                                                data-bs-toggle="modal" data-bs-target="#unblockModal">
                                                Unblocked
                                            </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user-block">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card smith-userblock" style="width: 18rem;">
                                    <img src="{{ asset('assests/images/blockuser.svg')}}" class="card-img-top"
                                        alt="block-user">
                                    <div class="card-body block-content">
                                        <h5 class="card-title">Smith Jhonsom</h5>
                                        <p class="card-text"><img src="{{ asset('assests/images/gemsimg.svg')}}" alt="gems"
                                                width="20px"> Starts from 50 Gems</p>
                                                <button type="button" class="unblock-btn"
                                                data-bs-toggle="modal" data-bs-target="#unblockModal">
                                                Unblocked
                                            </button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card smith-userblock" style="width: 18rem;">
                                    <img src="{{ asset('assests/images/blockuser.svg')}}" class="card-img-top"
                                        alt="block-user">
                                    <div class="card-body block-content">
                                        <h5 class="card-title">Smith Jhonsom</h5>
                                        <p class="card-text"><img src="{{ asset('assests/images/gemsimg.svg')}}" alt="gems"
                                                width="20px"> Starts from 50 Gems</p>
                                                <button type="button" class="unblock-btn"
                                                data-bs-toggle="modal" data-bs-target="#unblockModal">
                                                Unblocked
                                            </button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card smith-userblock" style="width: 18rem;">
                                    <img src="{{ asset('assests/images/blockuser.svg')}}" class="card-img-top"
                                        alt="block-user">
                                    <div class="card-body block-content">
                                        <h5 class="card-title">Smith Jhonsom</h5>
                                        <p class="card-text"><img src="{{ asset('assests/images/gemsimg.svg')}}" alt="gems"
                                                width="20px"> Starts from 50 Gems</p>
                                                <button type="button" class="unblock-btn"
                                                data-bs-toggle="modal" data-bs-target="#unblockModal">
                                                Unblocked
                                            </button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card smith-userblock" style="width: 18rem;">
                                    <img src="{{ asset('assests/images/blockuser.svg')}}" class="card-img-top"
                                        alt="block-user">
                                    <div class="card-body block-content">
                                        <h5 class="card-title ">Smith Jhonsom</h5>
                                        <p class="card-text"><img src="{{ asset('assests/images/gemsimg.svg')}}" alt="gems"
                                                width="20px"> Starts from 50 Gems</p>
                                                <button type="button" class="unblock-btn"
                                                data-bs-toggle="modal" data-bs-target="#unblockModal">
                                                Unblocked
                                            </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- model  -->
                <div class="modal fade" id="unblockModal" tabindex="-1" aria-labelledby="unblockModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center">
                            <div class="modal-header unblock-model">
                                <div class="user-blockicon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <button type="button" class="btn-close closebtn-block" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body block-contentt">
                                
                                <h3>Unblock This User!</h3>
                               <p>Are you sure you want to unblock this user?</p> 
                            </div>
                            <div class="modal-footer blokuser-footer justify-content-center">
                                <button type="button"
                                    data-bs-dismiss="modal" class="unblockbtn-cancel">Cancel</button>
                                <button type="button"
                                    id="confirmUnblock" class="unblockbtn-btn">Unblock</button>
                            </div>
                        </div>
                    </div>
                </div>
</div>
</main>
@endsection