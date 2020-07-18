{% extends 'externa/partial.twig.php' %}

{% block body %}

<div class="max-width vertical-center text-center">
    <img 
        src="{{BASE}}assets/img/error.svg" 
        width="300" 
        height="auto" 
        alt=""
    >
    <h1>Erro</h1>
    <p style="margin-bottom: 10px;">{{message}}</p>
    <a class="btn" href="{{BASE}}/">Voltar a home</a>
</div>
{% endblock %}