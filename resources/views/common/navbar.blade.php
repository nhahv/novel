<!-- mobile navbar -->
<div class="mb-nav">
    <div class="mb-nav-wrap">
        <div class="mb-nav-search">
            <form action="{{ url('search') }}" method="get" enctype="multipart/form-data">
                <input class="top_search" id="searchInput_mobile" type="text" placeholder="@lang('commons.top_search_place_holder')" name="keyword" onkeydown="EnterKey(event);" />
                <input class="top_search_submit" type="submit" value="@lang('commons.search')" title="Search" />
            </form>
            <div class="clr"></div>
        </div>
        <a class="mb-nav-a" href="/" title="@lang('menu.home_page')">@lang('menu.home_page')</a>
        <a class="mb-nav-a" title="@lang('menu.genre')">@lang('menu.genre')</a>
        <div class="mb-nav-sub">
            @foreach($genres as $key => $genre)
            <a title="{{ $genre }}" href="{{ route('category', ['category' => $key]) }}">{{ $genre }}</a>
            @endforeach
        </div>
        <a class="mb-nav-a" href="{{ route('release') }}" title="@lang('menu.release')">@lang('menu.release')</a>
        <a class="mb-nav-a" href="{{ route('top') }}" title="@lang('menu.ranking')">@lang('menu.ranking')</a>
        <a class="mb-nav-a" href="{{ route('authors') }}" title="@lang('menu.authors')">@lang('menu.authors')</a>
        <a href="{{ route('over') }}" class="mb-nav-a" title="@lang('menu.full')">@lang('menu.full')</a>
        {{--<a href="{{ route('category', ['category' => 'mingzhu']) }}" class="mb-nav-a" title="完结小说">名著</a>--}}
    </div>
</div>
<!-- / mobile navbar -->
<!-- navbar -->
<div id="navbar">
    <ul class="top_nav">
        <li class="active"><a class="top_nav_home" href="/" title="@lang('menu.home_page')"></a></li>
        <li><a title="@lang('menu.genre')">@lang('menu.genre')</a>
            <div class="menu-expand">
                <ul class="menu-expand-ul">
                    @foreach($genres as $key => $genre)
                        <li><a title="{{ $genre }}" href="{{ route('category', ['category' => $key]) }}">{{ $genre }}</a></li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li><a href="{{ route('release') }}" title="@lang('menu.release')">@lang('menu.release')</a></li>
        <li><a href="{{ route('top') }}" title="@lang('menu.ranking')">@lang('menu.ranking')</a></li>
        <li><a href="{{ route('authors') }}" title="@lang('menu.authors')">@lang('menu.authors')</a></li>
        <li><a href="{{ route('over') }}" title="@lang('menu.full')">@lang('menu.full')</a></li>
        {{--<li><a href="{{ route('category', ['category' => 'mingzhu']) }}" title="文学名著">文学名著</a></li>--}}
    </ul>
    <div class="nav_social"></div>
</div>
<!-- / navbar -->
