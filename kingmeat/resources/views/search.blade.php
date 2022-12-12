@extends('layouts.default')

@section('title', '検索ページ')

@section('pageCss')
<link rel="stylesheet" href="../css/search.css">
@endsection

@include('layouts.header')

@section('main')
<div class="search-wrapper">
  <form action="/meat/search" method="GET">
    @csrf
    <div class="form1-wrapper">
      <label for="menu" class="menu">メニュー名 <input id="menu" class="menu2" type="text" name="name"></label>
      <select name="category_id" class="">
        <option disabled selected></option>
        @foreach ($categorys as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form2-wrapper">
      <label for="price" class="input-number">値段： ¥ <input type="number" name="price_low" for="price" placeholder="0"> 〜 ¥ <input type="number" name="price_heigh" for="price" placeholder="指定なし"></label>
    </div>
    <div class="form2-wrapper">
      <label for="calorie" class="input-number">カロリー： <input type="number" name="calorie_low" for="calorie" placeholder="指定なし"> kcal 〜 <input type="number" , name="calorie_heigh" for="calorie"> kcal</label>
    </div>
    <input type="submit" value="検索" class="search-btn">
  </form>
</div>
<div class="grid-wrap">
  @foreach( $menus as $menu )
  <div class="grid-box">
    <div class="img-wrapper">
      @if ($menu->path !== '')
      <img src="{{ \Storage::url($menu->path) }}" alt="">
      @else
      <img src="{{ \Storage::url('images/noimage.png') }}" alt="">
      @endif
    </div>
    <div class="inner-box">
      <p class="menu-name">{{$menu->name}}</p>
      <div class="detail-inner">
        <p class="price">¥{{$menu->price}}</p>
        <p class="calorie">{{$menu->calorie}}kcal</p>
        @foreach( $categorys as $category)
        @if($menu->category_id == $category->id)
        <p class="category">{{ $category->name }}</p>
      </div>
      <form action="/meat/delete/{{$menu->id}}" method="POST">
        @csrf
        <input type="submit" value="削除" class="del-btn">
      </form>
    </div>
  </div>
  @endif
  @endforeach
  @endforeach
</div>
<form action="/meat/return" method="GET">
  <input type="submit" value="戻る" class="return-btn">
</form>
@endsection