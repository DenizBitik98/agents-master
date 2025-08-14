@php($pages = ceil($all/$limit))
<nav aria-label="">
    <ul class="pagination">
        @foreach(range(1, $pages) as $i)
            <li class="page-item {{ $i == $page ? 'active' : '' }}"><a class="page-link" data-page={{$i}} href="{{ route($route, ['page'=> $i]) }}">{{$i}}</a></li>
        @endforeach
    </ul>
</nav>
