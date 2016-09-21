<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>A Simple Page with CKEditor</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="ckeditor/ckeditor.js"></script>
        <script src="ckfinder/ckfinder.js"></script>
    </head>
    <body>
      <?php
      $config['authentication'] = function() {
        return true;
      };
       ?>
        <form action="{{ route('Noticia.salvar') }}" method="post" class="form-horizontal" >{{ csrf_field() }}
          <div class="control-label col-md-offset-1 col-md-1">
            <label for="titulo">Titulo</label>
          </div>
          <div class="form-group col-md-10">
            <input type="text" name="titulo" class="form-control" placeholder="Titulo da Noticias">
          </div>

            <textarea name="descricao" id="descricao" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <div class="control-label col-md-offset-1 col-md-1">
              <label for="palavras_chave">Titulo</label>
            </div>
            <div class="form-group col-md-10">
              <input type="text" name="palavras_chave" class="form-control" placeholder="palavras_chave">
            </div>
            <p>
              <input type="submit" name="Salvar" value="Salvar">
            </p>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'descricao', {
                    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl: '/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                } );

              CKFinder.widget( 'ckfinder1', {
                  height: 600
              } );

            </script>

        </form>
    </body>
</html>
