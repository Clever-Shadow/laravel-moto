<!doctype html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Moto</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container" style="text-align: center;">
      <div class="span4" style="display: inline-block;margin-top:100px;">
        @if(isset($errors) && $errors->has(''))
          <div class="alert alert-block alert-error fade in"id="error-block">
            <?php
            $messages = $errors->all('<li>:message</li>');
            ?>
            <button type="button" class="close"data-dismiss="alert">×</button>

            <h4>Warning!</h4>
            <ul>
              @foreach($messages as $message)
                {{$message}}
              @endforeach

            </ul>
          </div>
        @endif
        <form name="addimagetoalbum" method="POST"action="{{URL::route('add_image_to_album')}}"enctype="multipart/form-data">
            {{ csrf_field() }}
          <input type="hidden" name="album_id"value="{{$album->id}}" />
          <fieldset>
            <legend>Добавить мото в {{$album->name}}</legend>
            <div class="form-group">
              <label for="description">Описание</label>
              <textarea name="description" type="text" class="form-control" placeholder="Описание" required></textarea>
            </div>
            <div class="form-group">
              <label for="image">Выберите изображение</label>
              {{Form::file('image')}}
            </div>
            <button type="submit" class="btnbtn-default">Добавить!</button>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>