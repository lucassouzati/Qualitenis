@extends('layouts.app')
@section('content')

<style media="screen">
hr.style17 {
  border-top: 1px solid #8c8b8b;
  text-align: center;
}
hr.style17:after {
  content: '§';
  display: inline-block;
  position: relative;
  top: -14px;
  padding: 0 10px;
  background: #f0f0f0;
  color: #8c8b8b;
  font-size: 18px;
  -webkit-transform: rotate(60deg);
  -moz-transform: rotate(60deg);
  transform: rotate(60deg);
}
</style>


  <div class="container">
    <div class="row">
        <form >
          <div class="col-xs-3">
          <br>
            <?php $i = 0; ?>
            @foreach ($noticias as $noticia)
              <?php if ($i==0) {
                if (isset($noticia_escolhida)) {
                  $not = $noticia_escolhida;
                }else{
                  $not = $noticia;
                }
                
              }else {
                $i++;
              } ?>
            <div class="row">


              <div class="col-xs-12">
                <a href="{{route('Noticia.selecionar',$noticia->id)}}"><?php echo  $noticia->titulo  ?></a>

                </div>
            </div>
            <hr class="style17">
            @endforeach
          </div>
            <div class="col-xs-9">
              <?php echo  $not->descricao  ?>

            </div>
        </form>
    </div>
  </div>
@endsection
