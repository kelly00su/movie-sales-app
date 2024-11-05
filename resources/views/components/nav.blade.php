<!-- resources/views/components/nav.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" style="margin-left: 25px" href="#">Movie Sales</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('analytics') }}">Analytics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.admin.index') }}">Admin Dashboard</a>
            </li>
        </ul>
    </div>
</nav>