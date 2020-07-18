{% extends 'partials/body.twig.php' %}

{% block title %}{{receita.titulo}}{% endblock %}

{% block body %}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v7.0&appId=688013215034699&autoLogAppEvents=1" nonce="ETapyB7G"></script>

<div class="max-width mt-3">
    <h1>{{receita.titulo}}</h1>
    <p>Publicado em: {{receita.dataPublicacao | date(DATE_TIME) }}</p>


    <a href="{{BASE}}?url=editar&id={{receita.id}}" class="btn btn-sm btn-warning">Editar</a>
    <a href="{{BASE}}?url=editarThumb&id={{receita.id}}" class="btn btn-sm btn-success">Editar Thumb</a>
    <a href="{{BASE}}?url=delete&id={{receita.id}}" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente deletar?')">Delete</a>
    <hr>

    <img
        class="img-fluid"
        src="{{BASE}}resources/{{receita.thumb}}" 
        alt="Thumb da receita"
    >
    <hr>


    <div id="dvConteudoReceita">
        {{ receita.conteudo | raw }}
    </div>

    <hr>

    <div>
        <h3>Tags</h3>
        {% for t in tags %}
        <span class="badge badge-primary">{{t}}</span>
        {% endfor %}
    </div>

    <hr>

    <div>
        <div class="fb-comments" data-href="{{HOST}}?url=ver&id={{id}}" data-numposts="6" data-width="100%" data-colorscheme="dark"></div>
    </div>
</div>

</div>
{% endblock %}