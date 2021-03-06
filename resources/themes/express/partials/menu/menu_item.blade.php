@foreach($menus as $menu)
 @if($menu->hasChildren('active') && $menu->user_can_access)
     <li class="nav-item dropdown {{ \Request::is($menu->active_menu_url)?'active':'' }}">
         <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
             @if($menu->icon)<i class="{{ $menu->icon }} fa-fw"></i>@endif {{ $menu->name }}
             <i class="ion-chevron-down"></i>
         </a>
         <ul class="dropdown-menu">
             @include('partials.menu.menu_item',['menus' => $menu->getChildren('active')])
         </ul>
     </li>
 @elseif($menu->user_can_access)
     <li class="nav-item {{ \Request::is($menu->active_menu_url)?'active':'' }}">
         <a class="nav-link" href="{{ url($menu->url) }}" target="{{ $menu->target??'_self' }}">
             @if($menu->icon)<i class="{{ $menu->icon }} fa-fw"></i>@endif {{ $menu->name }}
         </a>
     </li>
 @endif
@endforeach