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
  <body class="collection">
    <header>
        <h1>LUDOTHEQUE</h1>
    </header>
    <section>
      <table class="Dashboard">
        <thead class="topDashboard">
          <th>Id</th>
          <th>Nom</th>
          <th>Supports</th>
        </thead>
        @foreach($games as $value => $game)
        <tbody class="car">
          <tr>
            <p>{{ $game[$value]->idgame }}</p>
          </tr>
          <tr>
            <p>{{ $game[$value]->name }}</p>
          </tr>
          <tr>
            <p>{{ $game[$value]->platform }}</p>
          </tr>
          <form method="post" action="{{ route('deleteCollection') }}">
            <input type="hidden" name="id" value="{{ $game[$value]->id }}">
            <input type="submit" placeholder="Suprimer">
          </form>
        </tbody>
        @endforeach
      </div>
    </section>
    <footer>
    </footer>
    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/flickity-docs.min.js') }}"></script>
  </body>
</html>
