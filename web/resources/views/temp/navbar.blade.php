<div class="navbar navbar-expand-lg navbar-dark bg-primary navbar-static">
    <div class="d-flex flex-1 d-lg-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-paragraph-justify3"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-transmission"></i>
        </button>
    </div>

    <div class="navbar-brand text-center text-lg-left">
        <a href="index.html" class="d-inline-block">
            <img src="../../../../global_assets/images/logo_light.png" class="d-none d-sm-block" alt="">
            <img src="../../../../global_assets/images/logo_icon_light.png" class="d-sm-none" alt="">
        </a>
    </div>

    <div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">       
        <span class="badge badge-success my-3 my-lg-0 ml-lg-3">Online</span>        
    </div>

    <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
        <li class="nav-item nav-item-dropdown-lg dropdown">
            <a href="#" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown">
                <i class="icon-bell2"></i>
                <span class="badge badge-warning badge-pill ml-auto ml-lg-0">2</span>
            </a>
            
            <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-lg-350">
                <div class="dropdown-content-header">
                    <span class="font-weight-semibold">Messages</span>
                    <a href="#" class="text-body"><i class="icon-compose"></i></a>
                </div>

                <div class="dropdown-content-body dropdown-scrollable">
                    <ul class="media-list">
                        <li class="media">
                            <div class="mr-3 position-relative">
                                <img src="../../../../global_assets/images/demo/users/face10.jpg" width="36" height="36" class="rounded-circle" alt="">
                            </div>

                            <div class="media-body">
                                <div class="media-title">
                                    <a href="#">
                                        <span class="font-weight-semibold">James Alexander</span>
                                        <span class="text-muted float-right font-size-sm">04:58</span>
                                    </a>
                                </div>

                                <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="mr-3 position-relative">
                                <img src="../../../../global_assets/images/demo/users/face3.jpg" width="36" height="36" class="rounded-circle" alt="">
                            </div>

                            <div class="media-body">
                                <div class="media-title">
                                    <a href="#">
                                        <span class="font-weight-semibold">Margo Baker</span>
                                        <span class="text-muted float-right font-size-sm">12:16</span>
                                    </a>
                                </div>

                                <span class="text-muted">That was something he was unable to do because...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="mr-3">
                                <img src="../../../../global_assets/images/demo/users/face24.jpg" width="36" height="36" class="rounded-circle" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-title">
                                    <a href="#">
                                        <span class="font-weight-semibold">Jeremy Victorino</span>
                                        <span class="text-muted float-right font-size-sm">22:48</span>
                                    </a>
                                </div>

                                <span class="text-muted">But that would be extremely strained and suspicious...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="mr-3">
                                <img src="../../../../global_assets/images/demo/users/face4.jpg" width="36" height="36" class="rounded-circle" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-title">
                                    <a href="#">
                                        <span class="font-weight-semibold">Beatrix Diaz</span>
                                        <span class="text-muted float-right font-size-sm">Tue</span>
                                    </a>
                                </div>

                                <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="mr-3">
                                <img src="../../../../global_assets/images/demo/users/face25.jpg" width="36" height="36" class="rounded-circle" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-title">
                                    <a href="#">
                                        <span class="font-weight-semibold">Richard Vango</span>
                                        <span class="text-muted float-right font-size-sm">Mon</span>
                                    </a>
                                </div>
                                
                                <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="dropdown-content-footer justify-content-center p-0">
                    <a href="#" class="btn btn-light btn-block border-0 rounded-top-0" data-popup="tooltip" title="Load more"><i class="icon-menu7"></i></a>
                </div>
            </div>
        </li>

        <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
            <a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown">
                <img src="{{asset('img/admin.png')}}" class="rounded-pill mr-lg-2" height="34" alt="">
                <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-primary badge-pill ml-auto">58</span></a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</div>