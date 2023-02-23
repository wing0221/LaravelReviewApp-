@extends('review/_layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">レビュー一覧</h3>
  </div>
</div>
{{-- <img src="{{ asset("storage/review_image/no_image.png") }}"> --}}
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">サムネイル</th>
        <th class="text-center">名称</th>
        <th class="text-center">メーカー</th>
        <th class="text-center">詳細</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($reviews as $review)
      <tr>
        <td>
          <a href="/review/{{ $review->id }}/edit">{{ $review->id }}</a>
        </td>
        <td>
          <img src="{{ asset($review->image) }}" width="64" height="64">
        </td>
        <td>{{ $review->name }}</td>
        <td>{{ $review->maker }}</td>
        <td>{{ $review->content }}</td>
        <td>
          <form action="/review/{{ $review->id }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    <div><a href="/review/create" class="btn btn-default">新規作成</a></div>
  </div>
</div>
@endsection