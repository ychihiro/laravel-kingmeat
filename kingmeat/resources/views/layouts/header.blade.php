@section('header')
<header>
  <div class="head-wrap">
    <div class="image">
      <img src="../image/icon.png" alt="">
    </div>
    <h1 class="ttl">King Meat</h1>
  </div>
</header>
<style>
  .head-wrap {
    display: flex;
    justify-content: center;
    letter-spacing: 0.1rem;
    color: #fff;
    background-color: #692927;
  }

  .ttl {
    font-family: 'Domine', serif;
    font-family: 'Noto Serif JP', serif;
    font-family: 'PT Serif', serif;
    font-size: 45px;
    font-weight: bold;
    text-align: center;
    height: 100px;
    line-height: 100px;
  }
</style>
@endsection