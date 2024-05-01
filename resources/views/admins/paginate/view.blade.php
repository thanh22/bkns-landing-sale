@if ($paginator->lastPage() > 1)
<nav aria-label="..." class="d-flex justify-content-end">
  <ul class="pagination">
    <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
      <a class="page-link" href="{{ $paginator->url($paginator->currentPage()-1) }}" >Next</a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="page-item {{($paginator->currentPage() == $i) ? ' active' : ''}}"><a class="page-link" href="{{ $paginator->url($i) }}">{{$i}}</a></li>
    @endfor
    <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
      <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>
    </li>
  </ul>
</nav>
@endif