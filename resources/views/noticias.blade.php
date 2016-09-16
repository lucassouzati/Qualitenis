<!DOCTYPE html>
<html>
<head>
  <script src="tinymce/tinymce.min.js"></script>
  <script src="tinymce/jquery.tinymce.min.js"></script>
  <script type="text/javascript">
  tinymce.init({

  selector: "textarea",  // change this value according to your HTML
  toolbar: "image",
  plugins: "image imagetools",

  });
  </script>
</head>

<body>
  <h1>TinyMCE Getting Started Guide</h1>
  <form method="post">
    <textarea id="mytextarea"></textarea>
  </form>
</body>
</html>
