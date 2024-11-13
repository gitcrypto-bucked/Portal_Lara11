
<aside id="sidebar-wrapper" >
    <div class="sidebar-brand">
        <!--desktop display -->
        @if(Auth::check())
        <a href="#" class="m-0" ><img src="{{asset("/empresas/".Auth::user()->company.".svg")}}" width="137" class=" ml-2 logo_desktop"></a>
        <p class="text-black lh-1  m-1 userDesktop">
            <strong class="text-black ml-2">{{Auth::user()->name}}</strong>
            <br>
            <strong class="text-black mt-0 lh-1">{{ucfirst(Auth::user()->company)}}</strong>
        </p>
        @else
            <a href="#" class="m-0" ><img src="{{asset("/empresas/lowcost.svg")}}" width="137" class=" ml-2 logo_desktop"></a>
            <p class="text-black lh-1  m-1 userDesktop">
                <br>
                <strong class="text-black mt-0 lh-1">LowCost</strong>
            </p>
        @endif
        <!--desktop display end-->
        <!--user display on mobile -->
        @if(Auth::check())
        <div class="mobile_user">
            <div class="">
                <a  class="userDisplay" aria-expanded="false">
                    <div style="float: left">
                        <img src='{{asset("/empresas/".Auth::user()->company.".png")}}' alt="" width="32" height="32"  id="userComapny"  >
                    </div>
                    &nbsp;<strong class="userName">{{Auth::user()->name}}</strong><br>{{ucfirst(Auth::user()->company)}}
                </a>
            </div>
        </div>
        @else
            <div class="mobile_user">
                <div class="">
                    <a  class="userDisplay" aria-expanded="false">
                        <div style="float: left">
                            <img src='{{asset("empresas/lowcost.png")}}' alt="" width="32" height="32"  id="userComapny"  >
                        </div>
                    </a>
                </div>
            </div>
        @endif
        <!--user display on mobile end-->
    </div>
{{--    <ul class="sidebar-nav">--}}
{{--        <li class="active">--}}
{{--            <!--        <a href="#" class=""><i class="fa fa-home"></i>Dashboard</a>-->--}}
{{--            <div class="accordion accordion-flush" id="accordionFlushExample">--}}
{{--                <div class="accordion-item">--}}
{{--                    <h2 class="accordion-header" id="flush-headingOne">--}}
{{--                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">--}}
{{--                            <i class="fa fa-home" style="font-size: 24px; padding-right:8px; "></i> Dashboard--}}
{{--                        </button>--}}
{{--                    </h2>--}}
{{--                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">--}}
{{--                        <div class="accordion-body">--}}
{{--                            <ul id="accordion_list">--}}
{{--                                <li>Xpto</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#"><i class="fa fa-plug"></i>Plugins</a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#"><i class="fa fa-user"></i>Users</a>--}}
{{--        </li>--}}
{{--    </ul>--}}
    <ul class="sidebar-nav">
     @if(Auth::check())
            @if(str_contains(Auth::user()->company,'lowcost')!=false)
                <li class="">
                    <a href="{{route('dashboard')}}" class=""><i class="fa fa-home"></i>Dashboard</a>
                </li>
                @if(Auth::user()->level=='admin' || Auth::user()->level=='1')
                    <li>
                        <a href="{{route('add_news')}}" ><i class="fa fa-newspaper-o"></i>Cadastrar noticias</a>
                    </li>
                    <li>
                        <a href="#" ><i class="fa fa-upload"></i>Carga Faturamento</a>
                    </li>
                @endif
                @if(Auth::user()->level=='admin')
                    <li>
                        <a href="{{route('new_user')}}" ><i class="fa fa-user-o"></i>Cadastrar Usuarios</a>
                    </li>
                @endif
            @else
            @endif
     @endif
    </ul>
    <br>
</aside>
