<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{route('home')}}" class="active">Home</a></li>
        @foreach ($categoriesLimit as $categoryParent)
            <li class="dropdown">
                <a href="#">{{$categoryParent->name}}
                    <i class="fa fa-angle-down"></i>
                    @include('client.components.child_menu',['categoryParent' => $categoryParent])
                </a>
            </li>
        @endforeach
        <li><a href="404.html">404</a></li>
        <li><a href="contact-us.html">Contact</a></li>
    </ul>
</div>
