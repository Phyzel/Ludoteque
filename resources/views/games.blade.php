<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="Anthony Lombard">
    <meta name="keywords" content="mots clé pour Google">
    <meta name="description" content="description">
    <!-- Affichage standard sur périphérique mobile pour site adaptatif -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Données Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="https://wallpaperaccess.com/full/38070.jpg">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:description" content="Description de la page">
    <meta property="og:title" content="Titre de la page">
    <meta property="og:site_name" content="Titre du site">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <link rel="icon" href="" type="image/gif" sizes="16x16"> 

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
    <title>LUDOTHEQUE</title>
  </head>
<!-- --> 
  <body  class="oneGame">
    <header>
        <h1>LUDOTHEQUE</h1>
    </header>
    <section>
    	<div class="baniere">
    		<img class="backgroundTop" src="https://images.igdb.com/igdb/image/upload/t_screenshot_huge/{{ $screenshots[1]->image_id }}.jpg">
    	</div>
    	<div class="description">
     	 	<img class="jaquette" src="https://images.igdb.com/igdb/image/upload/t_cover_big/{{ $game[0]->image_id }}.jpg">
     	 	<h1>{{ $response[0]->name}}</h1>
      	</div>
        <div class="info">
          <div class="summary">
            <p>{{$response[0]->summary}}</p>
          </div>
          <div class="down">
            <div class="rate">
              <img src="{{$rate}}">
            </div>
            <div class="rating">
              <p>{{$response[0]->rating}} / 100</p>
            </div>
          </div>
        </div>
        <h2>Ajouter à la collection</h2>
        <form method="post" action="{{ route('addCollection') }}">
            @csrf
            <SELECT name="platform" size="1" id="platform">
            @foreach($platforms as $value => $platform)
              <OPTION value="{{$platform[0]->name}}">{{$platform[0]->name}}
            @endforeach
            </SELECT>
            <input type="hidden" name="id" value="{{ $response[0]->id}}">
            <input type="hidden" name="name" value="{{ $response[0]->name}}">
            <input type="submit" placeholder="Ajouter à la collection">
        </form>
    </section>
    <footer>
    </footer>
    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/flickity-docs.min.js') }}"></script>
  </body>
</html>
