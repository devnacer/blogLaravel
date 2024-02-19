<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de Mot de Passe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            line-height: 1.5;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e8491d;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #333;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Réinitialisation de Mot de Passe</h1>
        <p>Cher(e) {{ $name }},</p>
        <p>Nous avons reçu une demande de réinitialisation de votre mot de passe. Si vous n'avez pas fait cette demande, veuillez ignorer cet e-mail.</p>
        <p>Cliquez sur le bouton ci-dessous pour réinitialiser votre mot de passe :</p>
        <a href="{{ $href }}" class="button">Réinitialiser le Mot de Passe</a>
        <div class="footer">
            <p>Merci,</p>
            <p>L'équipe Blog</p>
        </div>
    </div>
</body>
</html>
