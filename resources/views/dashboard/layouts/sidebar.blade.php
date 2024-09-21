<!-- Sidebar Navigation-->
<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('dashboard/img/avatar-6.jpg') }}" alt="..."
                class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"> <i
                    class="icon-home"></i>Dashboard</a>
        </li>
        <li class="{{ request()->is('dashboard/categories*') ? 'active' : '' }}"><a
                href="{{ route('dashboard.categories.index') }}"> <i class="icon-grid"></i>Categories</a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Books</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('dashboard.books.index') }}">All Books</a></li>
                <li><a href="{{ route('dashboard.books.create') }}">Create Books</a></li>
            </ul>
        </li>
        <li><a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Borrowings</a>
            <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                <li><a href="{{ route('dashboard.borrowings.request') }}">Request</a></li>
                <li><a href="{{ route('dashboard.borrowings.index') }}">Borrowings</a></li>
            </ul>
        </li>
        {{-- <li class="{{ request()->is('dashboard/borrowings*') ? 'active' : '' }}"><a
                href="{{ route('dashboard.borrowings.index') }}"> <i class="icon-grid"></i>Borrowings</a></li>
        <li> --}}
        <form id="logout" action="{{ route('logout') }}" method="POST" class="nav-link">
            @csrf
            <button type="submit" class="btn btn-primary">Logout <i class="icon-logout"></i></button>
        </form>
        </li>
    </ul>
</nav>
<!-- Sidebar Navigation end-->
