@extends('layouts.app')
@section('content')
<style media="screen">
.col-md-12 img{
    width: 250px;
    height: 250px;

}



</style>
  <div class="container">
    <div class="row">
        <form >
          <div class="col-md-3">
            <?php $i = 0; ?>
            @foreach ($noticias as $noticia)
              <?php if ($i==0) {
                $not = $noticia;
              }else {
                $i++;
              } ?>
            <div class="row">


              <div class="col-md-12">
                <a href="/home"><?php echo  $noticia->titulo  ?></a>

                </div>
            </div>

            @endforeach
          </div>
            <div class="col-md-9">
              <?php echo  $not->descricao  ?>

            </div>
        </form>
    </div>
  </div>
@endsection
