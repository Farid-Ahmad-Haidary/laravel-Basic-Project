<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body {
      background: #fafafa;
    }
    .form-container {
      max-width: 400px;
      margin: 40px auto;
      padding: 24px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #fafafa;
    }
    .form-title {
      text-align: center;
      margin-bottom: 24px;
    }
    .form-group {
      margin-bottom: 16px;
    }
    .form-label {
      display: block;
      margin-bottom: 6px;
    }
    .form-input, .form-file {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .form-file {
      padding: 0;
    }
    .form-submit {
      width: 100%;
      padding: 10px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <form action="{{ route('updatestudent', ['id' => $student->id]) }}" method="post" enctype="multipart/form-data" class="form-container">
    @csrf
    <h2 class="form-title">Update Student</h2>
    <div class="form-group">
      <input type="hidden" name="id"  value="{{$student->id}}" class="form-input">
    </div>
    <div class="form-group">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" id="name" value="{{$student->name}}" class="form-input">
    </div>
    <div class="form-group">
      <label for="last_name" class="form-label">Last Name</label>
      <input type="text" name="last_name" id="last_name" value="{{$student->last_name}}" class="form-input">
    </div>
    <div class="form-group">
      <label for="file" class="form-label">Photo</label>
      <input type="file" name="file" id="file" class="form-file">
    </div>
    <div class="form-group">
      <label for="docfile" class="form-label">Tazkra</label>
      <input type="file" name="tazkra" id="docfile"  class="form-file">
    </div>
    <div class="form-group">
      <label for="filevieo" class="form-label">Video</label>
      <input type="file" name="video" id="filevieo" class="form-file">
    </div>
    <button type="submit" class="form-submit">Submit</button>
  </form>
</body>
</html>