<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title> Gestión de Librería - MongoDB </title>
  <style>
    body { background-color: #fee8e8; width: 90%; max-width: 1200px; margin: 0 auto; font-family: sans-serif; }
    main { background-color: #ffe0e0; margin: 50px auto; padding: 40px; text-align: center; border-radius: 10px; }
    .nav-container { display: flex; justify-content: center; gap: 20px; margin-top: 30px; }
    .nav-card {
      background-color: #fff6f6;
      border: 1px solid #ddd;
      padding: 30px;
      border-radius: 8px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
      transition: transform 0.2s;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .nav-card:hover { transform: scale(1.05); background-color: #fff; }
  </style>
</head>
<body>
  <main>
    <h1> Sistema de Gestión de Librería </h1>
    <div class="nav-container">
      <a href="libros/index.php" class="nav-card"> 📚 Gestionar Libros </a>
      <a href="autores/index.php" class="nav-card"> ✍️ Gestionar Autores </a>
      <a href="clientes/index.php" class="nav-card"> 👥 Gestionar Clientes </a>
    </div>
  </main>
</body>
</html>