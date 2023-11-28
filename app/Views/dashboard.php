<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #FFC0CB
;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: black;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">
  <h1>About Valencia Shop</h1>
  <!-- <img src="assets/images/logo.PNG" alt="logo" style="height: 500px; width: 500ox;" /> -->

  <p class="title" style="color: black; font-size: 48px; font-family: 'Times New Roman', Times, serif;">Valencia Shop</p>


</div>
<br>
<h2 style="text-align:center">List Price !! </h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="assets/images/a.jpeg" alt="" style="width:100%">
      <div class="container">
        <br>
        <p class="title" style="color: white;">Selling Kepala Charger 2 Lubang USB Dengan Harga 35rb.</p>

        
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="assets/images/b.jpeg" alt="" style="width:100%">
      <div class="container"><br>
      <p class="title" style="color: white;">Selling Powerbank Merek ROBOT RT6800 Dengan Harga 150rb.</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="assets/images/c.jpeg" alt="" style="width:100%">
      <div class="container"><br>
      <p class="title" style="color: white;">Selling Powerbank Merek ROBOT RT5600 Dengan Harga 120rb.</p>
      </div>
    </div>
  </div>  
  
 

</body>
</html>

