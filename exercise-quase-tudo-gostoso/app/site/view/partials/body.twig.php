<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}{% endblock %} - Quase Tudo Gostoso</title>
    <link rel="stylesheet" href="{{BASE}}assets/css/style.css">
    <link rel="stylesheet" href="{{BASE}}assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{BASE}}assets/img/favicon.ico">
</head>

<body>

{% include 'partials/header.twig.php' %}

{% block body %}{% endblock %}

<script src="{{BASE}}assets/js/script.js"></script>
{% block scripts %}{% endblock %}
</body>

</html>