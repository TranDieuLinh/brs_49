@extends('layouts.master')
@section('css')
    <link href='{{ asset('/css/custom.css') }}' rel="stylesheet">
@stop
@section('sidebar-up')
    @foreach($data as $item)
    <section id="cd-timeline">
        <div class="cd-timeline-block">
            <div class="cd-timeline-img">
                @if($item->type == 'comment')
                    <img src="//c1.staticflickr.com/3/2900/33021316762_dda1d7712f.jpg" alt="Picture">
                @elseif($item->type == 'review')
                    <img src="//c1.staticflickr.com/3/2886/33021316572_587c517428_n.jpg" alt="Picture">
                @elseif($item->type == 'favorite')
                    <img src="//c1.staticflickr.com/1/610/33021315442_9e855a6e3f.jpg" alt="Picture">
                @elseif($item->type == 'read')
                    <img src="//c1.staticflickr.com/4/3940/33021315562_80b4e0c32e.jpg" alt="Picture">
                @elseif($item->type == 'rate')
                    <img src="//c1.staticflickr.com/1/669/33021315982_9586ed8f7d.jpg" alt="Picture">
                @endif
            </div> <!-- cd-timeline-img -->

            <div class="cd-timeline-content">
                @if($item->type == 'comment')
                    <h2>{{ $user->name }} đã bình luận về bài nhận xét của
                        <a style="color: #00e590" href="{{ route('user.show', \App\Models\Review::find($item->obj->review_id)->user->id) }}">{{ \App\Models\Review::find($item->obj->review_id)->user->name }}</a></h2>
                    <p>Nội dung: {{ $item->obj->content }}</p>
                    <span class="cd-date">{{ $item->obj->created_at }}</span>
                @elseif($item->type == 'review')
                    <h2>{{ $user->name }} đã nhận xét về cuốn <a style="color: #00e590" href="{{ route('book.show', $item->obj->book_id) }}">
                            {{ $item->obj->title }}"</a></h2>
                    <p>Nội dung: {{ $item->obj->content }}</p>
                    <span class="cd-date">{{ $item->obj->created_at }}</span>
                @elseif($item->type == 'favorite')
                    <h2>{{ $user->name }} đã thích cuốn <a style="color: #00e590" href="{{ route('book.show', $item->obj->book_id) }}">
                            {{ $item->obj->title }}"/></a></h2>
                    <span class="cd-date">{{ $item->obj->created_at }}</span>
                @elseif($item->type == 'read')
                    @if($item->obj->is_completed == 0)
                    <h2>{{ $user->name }} đang đọc cuốn <a style="color: #00e590" href="{{ route('book.show', $item->obj->book_id) }}">
                            {{ $item->obj->title }}"/></a></h2>
                        @else
                        <h2>{{ $user->name }} đã đọc xong cuốn <a style="color: #00e590" href="{{ route('book.show', $item->obj->book_id) }}">
                                {{ $item->obj->title }}"/></a></h2>
                    @endif
                        <span class="cd-date">{{ $item->obj->created_at }}</span>
                @elseif($item->type == 'rate')
                    <h2>{{ $user->name }} đã đánh giá {{ $item->obj->point }} sao cho cuốn <a style="color: #00e590" href="{{ route('book.show', $item->obj->book_id) }}">
                            {{ $item->obj->title }}"/></a></h2>
                    <span class="cd-date">{{ $item->obj->created_at }}</span>
                @endif

            </div> <!-- cd-timeline-content -->
        </div> <!-- cd-timeline-block -->

        <div class="cd-timeline-block">
            <!-- ... -->
        </div>
    </section>
    @endforeach
@stop
@section('script')
    <script src='{{ asset('/js/modernizr.js') }}'></script>
@stop