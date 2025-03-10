<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: green;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 34px;
            margin-top:10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="header">
        SMARTTECH
    </div>
    <div class="container mt-5">
        <h1 class="text-center">Connexion Admin</h1>
        <form action="page.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="password" class="form-control" id="code" name="code" maxlength="8" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Entrer</button>
            </div>
        </form>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            var codeInput = document.getElementById('code').value;
            if (codeInput !== '12345678') {
                event.preventDefault();
                alert('Code incorrect. Veuillez réessayer.');
            }
        });
    </script>
</body>
</html>
