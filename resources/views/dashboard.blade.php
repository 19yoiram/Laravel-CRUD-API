<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
   <div class="container">
    <form action="{{route('account.dashbaord')}}" method="GET">
        <div class="col-4">
        <div class="mb-3 mt-3">
            <input type="search" name="search" id="" class="form-control" placeholder="Search" value="{{request('search')}}" >
            <button type="submit" class="btn btn-primary btn-sm" >Search</button>
        </div>
    </div>
    </form>
        <table
            class="table">
            <thead>
                <tr>
                    <th >Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Adress</th>
                    <th>State</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->dob}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->state}}</td>
                    <td>{{$user->country}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{route('account.logout')}}" class="btn btn-danger btn-sm">Log out</a>
    </div>
    
   </div>
  </body>
</html>