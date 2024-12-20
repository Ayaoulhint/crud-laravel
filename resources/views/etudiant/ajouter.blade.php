<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #f4f4f4;
      }
      h1 {
        color: white;
        background-color: rgb(173, 120, 173);
        padding: 10px;
        border-radius: 5px;
        margin-top: -20px;
        text-align: center;
      }
      .btn-primary {
        background-color: rgb(173, 120, 173);
        border: none;
        color: white;
        transition: all 0.3s ease-in-out;
      }
    
      .btn-danger {
        background-color: rgb(173, 120, 173);
        border: none;
        color: white; 
        transition: all 0.3s ease-in-out;
      }
    
      .form-group label {
        font-weight: bold;
      }
      /* Center buttons */
      .button-container {
        display: flex;
        justify-content: center;
        gap: 10px; /* Space between buttons */
      }
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col s12">
          <h1>AJOUTER UN ETUDIANT</h1>
          <hr>
          <!-- Notification de succès -->
          @if (@session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif

          <!-- Affichage des erreurs -->
          <ul>
            @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
          </ul>

          <form action="/ajouter/traitement" method="POST" class="form-group">
            @csrf
            <div class="form-group mb-3">
              <label for="Nom">Nom</label>
              <input type="text" class="form-control" id="Nom" name="nom">
            </div>

            <div class="form-group mb-3">
              <label for="Prenom">Prenom</label>
              <input type="text" class="form-control" id="Prenom" name="prenom">
            </div>

            <div class="form-group mb-3">
              <label for="Classe">Classe</label>
              <input type="text" class="form-control" id="Classe" name="classe">
            </div>

            <!-- Buttons container -->
            <div class="button-container">
              <button type="submit" class="btn btn-primary">AJOUTER UN ETUDIANT</button>
              <a href="/liste_etudiant" class="btn btn-danger">REVENIR A LA LISTE DES ETUDIANTS</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
