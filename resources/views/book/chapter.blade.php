@extends('app')
@section('pagetype'){{"detail"}}@stop
@section('title'){{ $chapter->name }}-{{ $chapter->novel->name }} - {{ config('meta.site_name') }}@stop
@section('keywords'){{ $chapter->name }},@if($chapter->novel->is_over){{ $chapter->novel->name }}Full,@else{{ $chapter->novel->name }}Mói nhất,@endif{{ $chapter->novel->name }}, {{ config('meta.site_keywords')  }}@stop
@section('description')Đọc truyện {{ $chapter->novel->name }} chương {{ $chapter->name }} online。tác giả {{ $chapter->novel->author->name }},{{ $chapter->novel->name }} - {{ config('meta.site_description') }}@stop
@section('link')<link rel="canonical" href="{{ route('chapter', ['bookId'=> $chapter->novel->id, 'chapterId' => $chapter->id]) }}" />@stop
@section('js')
<script>
    var CHAPTER_INFO = {
        book_id: "{{ $chapter->novel_id }}",
        chapter_num: "{{ $chapter->novel->chapter_num }}",
        chapter_id: "{{ $chapter->id }}",
        chapter_name: "{{ $chapter->name }}"
    }
    function ad_filter(content) {
        return content.replace(/<script[^>]*?>.*?<\/script>/, '')
                    .replace(/公告：笔趣阁APP上线了，支持安卓，苹果。请关注微信公众号进入下载安装 appxsyd \(按住三秒复制\)/, '')
                    .replace(/公告：本站推荐一款免费小说APP，告别一切广告。请关注微信公众号进入下载安装 appxsyd \(按住三秒复制\)/, '')
                    .replace(/<img[^>]*?>.*?>/, '<div class="italic">Nguồn truyện bị lỗi</div>')
            ;
    }
    $(function () {
        var chapterHistory = {
            'id' : CHAPTER_INFO.chapter_id,
            'href' : window.location.href,
            'title' : CHAPTER_INFO.chapter_name
        };
        $.jStorage.set(CHAPTER_INFO.book_id, chapterHistory);
        var $content = $(".contents-comic");
        $content.html(ad_filter($content.html()));
	 

    });
</script>
@stop
@section('content')
    @if(isset($js))
    <script>
        var shareData = {
            title: document.title,
            link: window.location.href,
            desc: document.title,
            imgUrl: "{{ config('app.url') . $chapter->novel->cover }}"
        };
        wx.onMenuShareTimeline(shareData);
        wx.onMenuShareAppMessage(shareData);
        wx.onMenuShareQQ(shareData);
        wx.onMenuShareWeibo(shareData);
        wx.onMenuShareQZone(shareData);
    </script>
    @endif
<div class="view-page">
    <!-- Thong tin truyen -->
    <div class="detail-title clearfix">
        <h1 class="title"><a href="{{ route('book', ['bookId' => $chapter->novel_id]) }}" title="{{ $chapter->novel->name }}">{{ $chapter->novel->name }}</a> / {{ $chapter->name }}</h1>
        <input type="hidden" name="urlchange" value="{{ route('book', ['bookId' => $chapter->novel_id]) }}">
        <div class="tool-right">
            <a href="javascript:setbookmark();" title="Bookmark" class="btn">Bookmark</a>
        </div>
    </div>
    <!--/ thong tin truyen -->
    <div class="clearfix">
        <div class="flr chap-select-dropdown">
            @if(isset($next))
                <a href="{{ route('chapter', ['bookId' => $chapter->novel_id, 'chapterId' => $next->id]) }}" class="btn-blue next-page">Chương trước</a>
            @endif
            <a href="{{ route('book', ['bookId' => $chapter->novel_id]) }}" class="btn-blue">Danh sách</a>
            @if(isset($prev))
                <a href="{{ route('chapter', ['bookId' => $chapter->novel_id, 'chapterId' => $prev->id]) }}" class="btn-blue prev-page">Chướng tiếp</a>
            @endif
        </div>
    </div>
    <div style="margin-bottom: 1em"></div>
    
    <div class="detail-box">
        <div class="content" data-page="{{ $chapter->id }}">
            <h2 class="chapter-number">{{ $chapter->name }}</h2>
            <br class="clr">
            <div class="contents-comic">
                {!!  $chapter->content !!}
                <br/>
                <p class="pull-right italic text-muted">
                    {{ config('meta.content_description') }}
                </p>
            </div>
        </div>
    </div>

    <!--/ thong tin truyen -->
    <div class="clearfix">
        <div class="flr chap-select-dropdown">
            @if(isset($next))
                <a href="{{ route('chapter', ['bookId' => $chapter->novel_id, 'chapterId' => $next->id]) }}" class="btn-blue next-page">Chương trước</a>
            @endif
            <a href="{{ route('book', ['bookId' => $chapter->novel_id]) }}" class="btn-blue">Danh sách</a>
            @if(isset($prev))
                <a href="{{ route('chapter', ['bookId' => $chapter->novel_id, 'chapterId' => $prev->id]) }}" class="btn-blue prev-page">Chướng tiếp</a>
            @endif
        </div>
    </div>
</div>
@stop
