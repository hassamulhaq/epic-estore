@extends('layouts.dashboard')

@section('content')
    <div class="rc">
        <!-- Title -->
        <h3 class="gu text-slate-800 font-bold">Menus</h3>
    </div>
    <div class="bg-white bd rounded-sm rc">
        <div class="flex ak zc qv">

            <!-- Sidebar -->
            <div class="flex a_ lh l qx z_ vn vh cs zz tee border-slate-200 ur zg">
                <!-- Group 1 -->
                <div>
                    <div class="go gh gq gv ro">Add menu items</div>
                    @include('menu._particles.chose_menu', $onlyMenus)
                    {{--@dd($routes)--}}
                </div>
                <!-- Group Menu Item -->
                <div class="mt-7">
                    <div class="go gh gq gv ro flex flex items-center">
                        Add Routes
                        <div class="nr">
                            <!-- Start -->
                            <button class="btn-xs border-slate-200 hover--border-slate-300">
                                <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                                </svg>
                            </button>
                            <!-- End -->
                        </div>
                    </div>
                    <div class="border dw">
                        <form action="" method="get" id="blank-route-form">
                            <!-- route-block -->
                            <div class="routeFormatBlock">
                                <input type="hidden" name="data[count][]">
                                <div class="mb-3">
                                    <label class="text-sm block" for="route_title">
                                        <span>Route Title</span>
                                        <input name="data[route_title][]" class="s block" type="text" placeholder="Customers data">
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label class="text-sm block" for="route">
                                        <span>Route</span>
                                        <input name="data[route][]" class="s block" type="text" placeholder="customers">
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label class="text-sm block" for="route_name">
                                        <span>Route Name</span>
                                        <input name="data[route_name][]" class="s block" type="text" placeholder="customers.data">
                                    </label>
                                </div>
                                {{--<div class="mb-3">
                                    <label for="" class="text-sm block">Prefer SVG/Image</label>
                                    <div class="flex items-center gap-3">
                                        <div class="text-sm gq gm nq">Image</div>
                                        <div class="c">
                                            <input type="checkbox" name="pp[]" id="svg-toggle" class="d">
                                            <label class="h_" for="svg-toggle">
                                                <span class="bg-white bv" aria-hidden="true"></span>
                                                <span class="d">Immigration</span>
                                            </label>
                                        </div>
                                        <div class="text-sm gq gm nq">SVG</div>
                                    </div>
                                </div>--}}
                                {{--<div class="mb-3">
                                    <label for="route_icon" class="text-sm block">Route svg</label>
                                    <input type="text" name="route_icon[]" id="route_icon" class="f ou xq">
                                </div>--}}
                                <div class="mb-3">
                                    <label class="text-sm block">
                                        <span>Route Image/SVG</span>
                                        <input type="file" name="data[route_image][]" class="block w-full text-sm text-slate-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-gray-50 file:text-gray-700
                                        hover:file:bg-gray-100">
                                    </label>
                                </div>
                            </div> <!-- /_route-block -->
                            <div class="mb-3">
                                <button class="btn border-slate-200 hover--border-slate-300 g_">
                                    <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                                    </svg>
                                    <span class="nq">Add</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /_Group Menu Item -->
            </div>

            <!-- Panel -->
            <div class="uw">
                    <!-- Panel body -->
                    <div class="d_ fd">
                        <h4 class="text-slate-800 font-bold ii">Menu structure</h4>
                        <!-- Business Profile -->
                        <section>
                            <form action="{{ route('menu.create') }}" method="post">
                                @csrf
                                <input type="hidden" class="s ou" name="menu_type" value="{{ \App\Helpers\Constant::MENU_TYPE['menu'] }}">

                                <div class="je jc fg jm jb rw items-center">
                                    <div class="jr">
                                        <label class="block text-sm gp rt" for="menu_title">Menu Title</label>
                                        <input id="menu_title" name="menu_title" class="s ou" type="text" placeholder="Backend Menu">
                                    </div>
                                    <div class="ak border-slate-200">
                                        <label class="block text-sm gp rt" for="">&nbsp;</label>
                                        <button type="submit" class="btn ho xi ye ml-3">Save Menu</button>
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="text-red-600 text-sm">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </form>
                        </section>


                        <section class="mt-7 co pt-3">
                            <h3 class="text-slate-800 font-bold ii">Routes</h3>
                            <form action="{{ route('menu.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="s ou" name="menu_type" value="{{ \App\Helpers\Constant::MENU_TYPE['route'] }}">

                                <input type="hidden" name="selected_menu_id" value="{{ Request::get('selected_menu') }}">
                                <ul id="routeList" class="list-none"></ul>

                                <div class="flex ak vm vg border-slate-200">
                                    <div class="flex ls">
                                        <button type="submit" class="btn ho xi ye ml-3">Save Routes</button>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>

                    <!-- Panel footer -->
                    <footer>
                        {{--<div class="flex ak vm vg co border-slate-200">
                            <div class="flex ls">
                                <button type="submit" class="btn ho xi ye ml-3">Save Routes</button>
                            </div>
                        </div>--}}
                    </footer>

            </div>

        </div>
    </div>


    @push('css_after')
        <style>
            .routeListItem {
                border: 1px dotted #cecece;
                border-radius: .25rem;
                margin-bottom: 2px;
            }
            .routeListItem .routeFormatBlock {
                display: flex;
                gap: 6px;
            }
            .mint-background-class {
                background-color: #c0ffe8;
            }
        </style>
    @endpush

    @push('js_after')
        <!-- will remove sortablejs cdn later -->
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

        <script>
            new Sortable(routeList, {
                animation: 150,
                ghostClass: 'mint-background-class'
            })


            let itemNo = 0;
            $('form#blank-route-form').on('submit', (e) => {
                e.preventDefault();
                itemNo++;

                let $form = $(e.target);
                let UlRouteList = $('ul#routeList');
                //$form.find(".routeFormatBlock").clone().appendTo(UlRouteList);
                let removeBtn = '<button type="button" onclick="removeList(this, itemNo)" class="btn-xs"><svg class="oo sl du yl ub" viewBox="0 0 16 16"> <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z"></path></svg></button>';
                UlRouteList.append('<li id="routeListItem-'+itemNo+'" class="routeListItem flex items-center">'+removeBtn+'</li>');
                $('#routeListItem-'+itemNo+'').append($form.find(".routeFormatBlock").clone())

                $form.trigger('reset');
            })


            function removeList(target, itemNo) {
                $(target).parent('li').remove();
            }
        </script>
    @endpush
@endsection
