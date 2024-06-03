@php
    $getMenu = getMenu();

    $noc = 0;
    $ids = "";
@endphp

<ul>
    @foreach($getMenu as $menu)
        @if($menu->parent_id == null AND $menu->has_children == 0)
            <li class="nav-item @if(request()->routeIs($menu->route)) active @endif">
                <a href="{{ route($menu->route) }}">
                    <span class="icon">
                        {!! $menu->icon !!}
                    </span>
                    <span class="text">{{ $menu->title }}</span>
                </a>
            </li>
        @elseif($menu->has_children >= 1)
        @php
            $noc++;
            $ids = 'ddmenu_'.$noc;
        @endphp
            <li class="nav-item nav-item-has-children">
                <a class="collapsed" href="#{{ $noc }}" class="" data-bs-toggle="collapse" data-bs-target="#{{ $ids }}"
                aria-controls="{{ $ids }}" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        {!! $menu->icon !!}
                    </span>
                    <span class="text">{{ $menu->title }}</span>
                </a>
                <ul id="{{ $ids }}" class="dropdown-nav collapse">
                    @foreach($menu->children as $child)
                        <li>
                            <a href="{{ route($child->route) }}">{{ $child->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
    @endforeach
</ul>