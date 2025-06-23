<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="{{route('storestudent')}}" method="post" enctype="multipart/form-data" style="max-width: 400px; margin: 40px auto; padding: 24px; border: 1px solid #ddd; border-radius: 8px; background: #fafafa;">
    @csrf
    <h2 style="text-align:center; margin-bottom: 24px;">Add Student</h2>
    <div style="margin-bottom: 16px;">
      <label for="name" style="display:block; margin-bottom: 6px;">Name</label>
      <input type="text" name="name" id="name" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
    </div>
    <div style="margin-bottom: 16px;">
      <label for="last_name" style="display:block; margin-bottom: 6px;">Last Name</label>
      <input type="text" name="last_name" id="last_name" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
    </div>
    <div style="margin-bottom: 24px;">
      <label for="file" style="display:block; margin-bottom: 6px;">Photo</label>
      <input type="file" name="file" id="file" style="width:100%;">
    </div>
        <div style="margin-bottom: 24px;">
      <label for="docfile" style="display:block; margin-bottom: 6px;">Tazkra</label>
      <input type="file" name="tazkra" id="docfile" style="width:100%;">
    </div>
        <div style="margin-bottom: 24px;">
      <label for="filevieo" style="display:block; margin-bottom: 6px;">Video</label>
      <input type="file" name="video" id="filevieo" style="width:100%;">
    </div>
    <button type="submit" style="width:100%; padding:10px; background:#007bff; color:#fff; border:none; border-radius:4px; font-size:16px;">Submit</button>
  </form>
  
</body>
</html>