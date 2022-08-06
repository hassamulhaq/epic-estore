{{-- @devhassam --}}

<div class="ff">
    {{--@foreach()--}}
    <div>
        <ul class="divide-y divide-slate-100">

            <ul class="nk">
                <h3 class="go gv text-slate-500 gh vz">
                    <span class="hidden tey ttq 2xl:hidden gn oi" aria-hidden="true">•••</span>
                    <span class="tex ttj 2xl:block">{{ $slot }}</span>
                </h3>

                @include('/menu-item/menu-item')
            </ul>

            {{ $slot }}
        </ul>
    </div>
    {{--@endforeach--}}
</div>
