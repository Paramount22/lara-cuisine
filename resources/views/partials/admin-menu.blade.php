<nav class="nav-admin">
    <div class="container">
        <ul class="admin-menu">
            <li><a href="{{ url('admin/all') }}">Home</a></li>
            <li><a href="{{ route('users') }}">Users</a></li>
            <li><a href="{{ route('recipes') }}">Recipes</a></li>
            <li><a href="{{ route('comments') }}">Comments</a></li>
            <li><a href="{{ route('categories') }}">Categories</a></li>
        </ul>
    </div>
</nav>
