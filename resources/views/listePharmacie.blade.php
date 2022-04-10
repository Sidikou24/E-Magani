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