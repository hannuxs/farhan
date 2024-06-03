<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salam Arsip</title>
	<link rel="stylesheet" href="indek.css"/>
 
</head>
<body>
    <div class="grid-container">
        <div>
            <a href="../farhan/login/login.html" class="a-content">
              <img src="../farhan/login/images/login.png" class="img-content" style="width: 100px; height: auto; margin: auto;"/>
              <p>Login</p>
        </div>
    </div>
    
    <div class="page"> 
        <main class="container">
            <div class="item">
                <i class="loader --2"></i>
            </div>
            <div class="item">
                <i class="loader --9"></i>
            </div>
            <div class="item">
                <i class="loader --3"></i>
            </div>
            
            <div class="item">
                <i class="loader --4"></i>
            </div>
            <div class="item">
                <i class="loader --1"></i>
            </div>
            <div class="item">
                <i class="loader --5"></i>
            </div>
            
            <div class="item">
                <i class="loader --6"></i>
            </div>
            <div class="item">
                <i class="loader --8"></i>
            </div>
            <div class="item">
                <i class="loader --7"></i>
            </div>
        </main>
    </div>

<div class=footer>
<footer class="container-fluid" id="footer">
  <p id="footer-text">Arsiparis Dinas Kesehatan <span id="tahun"></span></p>
</footer>
</div>
<script>
  const footerText = document.getElementById('footer-text');
  const tahunSpan = document.getElementById('tahun');
  const tahunSaatIni = new Date().getFullYear();
  tahunSpan.textContent = tahunSaatIni;
</script>
</body>
</html>