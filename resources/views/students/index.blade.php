<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f7f7f7;
      margin: 0;
      padding: 40px;
    }
    table {
      border-collapse: collapse;
      width: 80%;
      margin: 0 auto;
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    th, td {
      padding: 12px 18px;
      text-align: left;
      border-bottom: 1px solid #e0e0e0;
    }
    thead tr {
      background: #1976d2;
      color: #fff;
    }
    tbody tr:nth-child(even) {
      background: #f1f1f1;
    }
    tbody tr:hover {
      background: #e3f2fd;
    }
  </style>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Photo</th>
        <th>Tazkra Photo</th>
        <th>video</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
        <tr>
          <td>{{ $student->id }}</td>
          <td>{{ $student->name }}</td>
          <td>{{ $student->last_name }}</td>
          <td><img src="{{$student->file }}" width="70" height="80" alt=""></td>
          {{-- <td>{{$student->tazkra}}</td> --}}
          <td><img src="{{$student->tazkra }}" width="70" height="80" alt=""></td>
          {{-- <td>{{$student->video}}</td> --}}
          <td><video width="70" height="80" controls>
            <source src="{{$student->video}}" type="video/mp4">
        </tr>
      @endforeach
    </tbody>
  </table>
  <div style="width: 80%; margin: 30px auto 0 auto; text-align: right;">
    <a href="{{ route('createstudent') }}" style="
      display: inline-block;
      background: #1976d2;
      color: #fff;
      padding: 10px 22px;
      border-radius: 4px;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 0 2px 6px rgba(25,118,210,0.08);
      transition: background 0.2s;
    " onmouseover="this.style.background='#1565c0'" onmouseout="this.style.background='#1976d2'">
      Add New Student
    </a>
  </div>
  
</body>
</html>