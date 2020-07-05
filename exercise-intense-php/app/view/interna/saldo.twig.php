{% extends 'interna/partials/partial.twig.php' %}

{% block title %}Saldo - BOD{% endblock %}

{% block body %}

<div class="center">
    <h1 class="saldo">Saldo atual: R$ {{ saldo | number_format(2, '.', ',') }}</h1>
</div>

{% endblock %}