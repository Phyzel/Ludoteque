<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Ajout d'une voiture
                </div>
                <form action="{{ route('cars-insert') }}" method="post">
                    @csrf
                    <input type="text" name="brand" placeholder="Marque">
                    <input type="text" name="model" placeholder="Modèle">
                    <input type="text" name="color" placeholder="Couleur">
                    <input type="text" name="price" placeholder="Prix">
                    <input type="text" name="speed" placeholder="Vitesse max">
                    <button>Ajouter la voiture</button>
                </form>
                <h1>Liste des voitures</h1>
                <div class="cars">
                    <div class="car">
                        <p>Marque</p>
                        <p>Modèle</p>
                        <p>Couleur</p>
                        <p>Prix</p>
                        <p>Vitesse max</p>
                    </div>
                    @foreach($cars as $car)
                        <div class="car">
                            <p>{{ $car->brand }}</p>
                            <p>{{ $car->model }}</p>
                            <p>{{ $car->color }}</p>
                            <p>{{ $car->price }}</p>
                            <p>{{ $car->speed }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
