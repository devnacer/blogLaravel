<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'Inscription</title>
</head>
<body style="font-family: Arial, sans-serif;">

    <h2 style="color: #3498db;">Confirmation d'Inscription</h2>

    <p>Cher {{ $name }},</p>

    <p>Nous sommes ravis de vous informer que votre inscription a été confirmée avec succès !</p>

    <strong>Détails de votre compte :</strong>
    <ul>
        <li><strong>Nom d'utilisateur :</strong> {{ $name }}</li>
        <li><strong>Adresse e-mail :</strong> {{ $email }}</li>
    </ul>

    <p>Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter à <a href="http://127.0.0.1:8000/contact">Contact</a>.</p>

    <p>Merci de faire partie de notre communauté !</p>

    <!-- Lien de Confirmation -->
    <p>
        Merci de cliquer sur le lien suivant pour confirmer votre inscription :
        <br>
        <a href="{{ $href }}" style="color: #3498db;">Confirmer l'Inscription</a>
    </p>

    <p>Cordialement,<br>L'équipe Blog</p>

</body>
</html>
