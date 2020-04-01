<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
    </nav>
    <div class="container">
        <h2 style="text-align: center;">Data Persebaran Covid-19 di Indonesia</h2>
        <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Positif</th>
                    <th scope="col">Sembuh</th>
                    <th scope="col">Meninggal</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $sum = 0;
                        $sum2 = 0;
                        $sum3 = 0;
                    @endphp
                @foreach ($data as $datas)
                  <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $datas['attributes']['Provinsi'] }}</td>
                    <td>{{ $datas['attributes']['Kasus_Posi'] }}</td>
                    <td>{{ $datas['attributes']['Kasus_Semb'] }}</td>
                    <td>{{ $datas['attributes']['Kasus_Meni'] }}</td>
                  </tr>
                  @php
                  $sum += $datas['attributes']['Kasus_Posi'];
                  $sum2 += $datas['attributes']['Kasus_Semb'];
                  $sum3 += $datas['attributes']['Kasus_Meni'];

                  @endphp
                @endforeach
                @foreach ($total as $item)
                <tr>
                    <th scope="row"></th>
                      <td>Total</td>
                      <td>{{ $item['attributes']['value']}}</td>
                      <td>{{$sum2}}</td>
                    <td>{{$sum3}}</td>
                    </tr>
                @endforeach

                </tbody>
              </table>
</div>
</body>
</html>
