<li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i class="bi bi-bell-fill"></i> <span class="navbar-badge badge text-bg-warning">{{$newcount}}</span> </a>

    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <span class="dropdown-item dropdown-header">15 Notifications</span>
    <div class="dropdown-divider"></div>
        @foreach($notification as $item)

        <a href="{{$item->data['url']}}?notification={{$item->id}}" class="dropdown-item"> <i class="{{$item->data['icon']}}"></i> {{$item->data['body']}}
            <span class="float-end text-secondary fs-7">{{$item->created_at->diffForHumans()}}</span> </a>

        @endforeach

    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">
        See All Notifications
    </a>
</div>
</li>
