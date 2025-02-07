<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon"/>
    <title>Home</title>
    <link rel="stylesheet" href="/css/home.css">
  </head>
  <body>
    <header class="header">
      <nav class="navbar">
        <h2 class="logo"><a href="#">Tsgo - WebDev</a></h2>
        <input type="checkbox" id="menu-toggle" />
        <label for="menu-toggle" id="hamburger-btn">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
            <path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </label>
        <ul class="links">
          <li><a href="#">Sobre nós</a></li>
          <li><a href="#">Serviços</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="#">Contate-nos</a></li>
        </ul>
        <div class="buttons">
          <a href="/login" class="signin">Entrar</a>
          <a href="#" class="signup">Registra-se</a>
        </div>
      </nav>
    </header>
    <section class="hero-section">
      <div class="hero">
        <h2>Fábrica de Software​</h2>
        <p>
        Desenvolvemos soluções inteligentes para desafios complexos. Eficiência, celeridade, precisão e performance. Você sempre um passo a frente.
        </p>
      </div>
      <div class="img">
      <img src="/img/imag-home.png" alt="login" class="imag-login">
      </div>
    </section>
  </body>
</html>