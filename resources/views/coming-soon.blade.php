<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coming Soon</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
.btn-back {
    display: inline-block;
    padding: 10px 20px;
    background-color: #2a5298;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    border-radius: 8px;
    transition: background-color 0.3s ease;
  }

  .btn-back:hover {
    background-color: #1e3c72;
  }
    body {
      height: 100vh;
      background: linear-gradient(to right, #1e3c72, #2a5298);
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .coming-soon-container {
      max-width: 600px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 20px;
      box-shadow: 0 0 30px rgba(0,0,0,0.2);
    }

    h1 {
      font-size: 3rem;
      margin-bottom: 20px;
    }

    p {
      font-size: 1.2rem;
      margin-bottom: 30px;
    }

    .email-input {
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      width: 70%;
      margin-bottom: 15px;
    }

    .btn {
      padding: 10px 25px;
      background-color: #ffffff;
      color: #2a5298;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #e0e0e0;
    }
  </style>
</head>
<body>
  <div class="coming-soon-container">
    <h1>🚧 Sắp ra mắt!</h1>
    <p>Trang web đang trong quá trình hoàn thiện. Hãy quay lại sau!</p>
    <br>
    <a href="{{route('welcome')}}" class="btn-back">Quay lại</a>
  </div>
</body>
</html>
