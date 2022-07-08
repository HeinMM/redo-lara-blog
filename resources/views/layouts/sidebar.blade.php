<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{ route('home') }}">Home</a>
    <a class="list-group-item list-group-item-action" href="{{ route('test') }}">Test Page</a>
</div>

<p class="small text-black-50 mb-1">Manage Posts</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{ route('blog.index') }}">Post List</a>
    <a class="list-group-item list-group-item-action" href="{{ route('blog.create') }}">Create Post</a>
</div>

<p class="small text-black-50 mb-1">Manage Category</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{ route('category.index') }}">Category list</a>
    <a class="list-group-item list-group-item-action" href="{{ route('category.create') }}">Create Category</a>
</div>

@admin()
<p class="small text-black-50 mb-1">Manage User</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{ route('user.index') }}">User list</a>
</div>
@endadmin

