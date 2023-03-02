<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lora&family=Yeseva+One&display=swap');
* {
  --hibiscus-love: #fc465c;
  --fine-ii: #f9b198;
  --afl: #fac8af;
  --mexican-sky: #cfdddd;
  --brasillia-peach: #facb85;
  --free: #33032d;
  --captured: #2b2120;
  --primary-color: var(--brasillia-peach);
  --secondary-color: var(--hibiscus-love);
  --tertiary-color: var(--fine-ii);
  --quadrary-color: var(--afl);
  --bg-color: var(--mexican-sky);
  --text-color: var(--free);
  --header-color: var(--captured);
  --error-color: var(--hibiscus-love);
  --success-color: #73d12e;
  box-sizing: border-box;
}
h1, h2, h3, h4, h5 {
  font-family: 'Yeseva One', Georgia, cursive;
  color: var(--header-color);
}
body {
  font-family: 'Lora', 'Times New Roman', serif;
  background-color: var(--bg-color);
  color: var(--free);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-flow: column nowrap;
  min-height: 100vh;
}
.container {
  width: 400px;
  border-radius: 0.6em;
  padding: 20px;
  background-color:white;
  box-shadow: 20px 20px 60px #97a1a1, -20px -20px 60px #ffffff;
  margin: 20px auto;
}
.form {
  padding: 30px 40px;
}
.form h2 {
  text-align: center;
  margin: 0 0 20px;
}
.form-control {
  margin-bottom: 10px;
  padding-bottom: 20px;
  position: relative;
}
.form-control label {
  color:#1abc9c;
  display: block;
  margin-bottom: 5px;
}
.form-control input {
  border-radius: 6px;
  background: white;
  min-height: 2.618em;
  border: #1abc9c solid 2px;
  display: block;
  width: 100%;
  font-size: 14px;
  padding: 10px;
}
.form-control input:focus {
  outline: 0;
  border-color:#1abc9c;
}
.form-control.success input {
  border-color: #1abc9c;
}
.form-control.error input {
  border-color: var(--error-color);
}
.form-control small {
  color: var(--error-color);
  position: absolute;
  bottom: 0;
  left: 0;
  visibility: hidden;
}
.form-control.error small {
  visibility: visible;
}
.form button {
  cursor: pointer;
  background: #1abc9c;
  border: 1px solid #ec263c66;
  color: #fff;
  font-size: 16px;
  padding: 0.618em 1.2em;
  border-radius: 0.4em;
  font-family: 'Yeseva One', Georgia, cursive;
  display: block;
  margin-top: 1.2em;
  width: 100%;
}
.form button:active, .form button:focus {
  outline: 0;
  background-color: #1abc9c;
}

  </style>
  <body>
<h1 style="color: #1abc9c;">Register Your self</h1>

    <div class="container">
      <form action="{{URL:: to ('/register')}}" method="POST" id="form" class="form">
        @csrf
       
        <div class="form-control">
          <label for="username">Username</label>
          <input type="text" id="username" name="nameinput" placeholder="Enter username" />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="email">Email</label>
          <input type="email" id="email" name="emailinput" placeholder="Enter email" />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="password">Password</label>
          <input type="password" id="password" name="passwordinput" placeholder="Enter password" />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="password">Confirm Password</label>
          <input type="password" id="password" name="coninput" placeholder="Enter Confirm password" />
          <small>Error message</small>
        </div>
       @if(session('success'))

       <div class="alert alert-info" role="alert">
        <strong>{{(session('success'))}}</strong>
       </div>

       @endif
        <button type="submit">Submit</button>
      </form>
    </div>

  </body>
</html>
