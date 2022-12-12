@extends('layouts.default')

@section('title', 'トップページ')

@section('pageCss')
<link rel="stylesheet" href="../css/index.css">
@endsection

@include('layouts.header')

@section('main')
<div class="register-wrapper">
  <form action="/meat/create" method="POST" enctype="multipart/form-data">
    @csrf
    @error('name')
    <p class="error-name">※{{$message}}</p>
    @enderror
    <div class="form1-wrapper">
      <label for="menu" class="menu">メニュー名 <input id="menu" class="menu2" type="text" name="name"></label>
      <select name="category_id" class="">
        @foreach ($categorys as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    @error('price')
    <p class="error-price">※{{$message}}</p>
    @enderror
    @error('calorie')
    <p class="error-calorie">※{{$message}}</p>
    @enderror
    <div class="form2-wrapper">
      <label for="price" class="input-number">値段 <input type="number" name="price" for="price"></label>
      <label for="calorie" class="input-number">カロリー <input type="number" name="calorie" for="calorie"></label>
      <input class="img-btn" type="file" name="image">
    </div>
    <input type="submit" value="登録" class="register-btn">
  </form>
</div>
<div class="btn-wrapper">
  <button class="main-btn" type="button">メニュー</button>
  <form action="/meat/find" method="GET">
    <input type="submit" class="search-btn" value="検索ページ">
  </form>
</div>
<!-- grid -->
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
  @endsection

</div>