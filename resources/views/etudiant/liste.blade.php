<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      h1 {
        color: white;
        background-color: rgb(173, 120, 173);
        padding: 10px;
        border-radius: 5px;
        margin-top: 20px;
      }
      .btn-modern {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: white;
        text-transform: uppercase;
        text-decoration: none;
        border: none;
        border-radius: 30px;
        background: linear-gradient(45deg, #ac8cce, #300330); /* Dégradé violet-bleu */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        cursor: pointer;
      }
     
      .btn-update {
        background-color: #ac8cce;
        border: none;
        color: white;
        padding: 5px 15px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
      }
      .btn-update:hover {
        background-color: #9b7cb6;
        transform: scale(1.05);
      }
      .btn-delete {
        background-color: #300330;
        border: none;
        color: white;
        padding: 5px 15px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
      }
      .btn-delete:hover {
        background-color: #4c0d4c;
        transform: scale(1.05);
      }
      .pagination .page-item .page-link {
        z-index: 3;
        color: var(--bs-pagination-active-color);
        background-color: #ffffff;
        color: #000000;
        transition: all 0.3s ease-in-out;
      }

      .pagination .page-item.active .page-link {
        background-color: #e7afeb;
        color: #000000;
        border-color: #ffffff;
      }

    

      .pagination-container {
        /* display: flex; */
        justify-content: space-between;
        align-items: left;
      }

     
     
    </style>
  </head>
  <body>
    <div class="container text-center">
        <div class="row">
          <div class="col s12">
            <h1>CRUD IN LARAVEL</h1>
            <hr>
            <a href="/ajouter" class="btn-modern">Ajouter un étudiant</a>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Classe</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $ide = 1;
                    @endphp
                    @foreach($etudiants as $etudiant)
                    <tr>
                        <td>{{ $ide }}</td>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->classe }}</td>
                        <td>
                            <a href="/update-etudiant/{{ $etudiant->id }}" class="btn-update">Update</a>
                            <a href="/delete-etudiant/{{ $etudiant->id }}" class="btn-delete">Delete</a>
                        </td>
                    </tr>
                    @php
                    $ide += 1;
                    @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-container">
              <div class="pagination-info">
                {{ $etudiants->links('pagination::bootstrap-5') }}
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
