<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<a href="{{url('/')}}">Home</a><br><br><br><br><br><br><br><br>
La Liste des pharmacies inscrites sur E-Magani: <br><br><br><br>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Pharmacie</th>
      <th scope="col">Lieu</th>
      <th scope="col">Docteur</th>
    </tr>
  </thead>
  <tbody>
  
    @foreach ($pharmacies as $pharmacie )
        <tr>
        <td>{{ $pharmacie->name }}</td>
        <td>{{ $pharmacie->localite }}</td>
        <td>{{ $pharmacie->nom_proprio }}</td>
        </tr>
    @endforeach
  </tbody>
</table>
