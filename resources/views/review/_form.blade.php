<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>レビュー品登録</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            {{-- エラーメッセージ --}}
            @include('review/_error_message')

            {{-- $targetの中身でリクエストを変える --}}
            @if($target == 'store')
            <form action="/review" method="post">
            @elseif($target == 'update')
            <form action="/review/{{ $review->id }}" method="post">
                <input type="hidden" name="_method" value="PUT">
            @endif
            {{-- TODO 画像アップロード可能にする --}}
            {{-- TODO 確認画面を追加 --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="image">サムネイル</label>
                    <input type="text" class="form-control" name="image" value="{{ $review->image }}">
                </div>
                <div class="form-group">
                    <label for="name">名称</label>
                    <input type="text" class="form-control" name="name" value="{{ $review->name }}">
                </div>
                <div class="form-group">
                    <label for="maker">メーカー</label>
                    <input type="text" class="form-control" name="maker" value="{{ $review->maker }}">
                </div>
                <div class="form-group">
                    <label for="content">詳細</label>
                    <input type="text" class="form-control" name="content" value="{{ $review->content }}">
                </div>
                <button type="submit" class="btn btn-default">登録</button>
                <a href="/review">戻る</a>
            </form>
        </div>
    </div>
</div>