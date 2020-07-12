{% extends 'partials/body.twig.php' %}

{% block body %}
<div class="max-width">
    <h1>HOME</h1>

    {% for receita in receitas %}
    <div class="row">

        {% for item in receita %}
        <div class="col-md-3" style="margin:0;">
            <div class="card border-info mb-3" style="max-width: 20rem;">
                <div class="card-header" style="width:100%;">{{item.titulo}}</div>
                <div class="card-body">
                    <p class="card-text">{{item.dataPublicacao | date(DATE_TIME) }}</p>

                    <a href="{{BASE}}?url=ver&id={{item.id}}" class="btn btn-outline-info w-100">Visualizar</a>
                </div>
            </div>
        </div>
        {% endfor %}

    </div>
    {% endfor %}
    
</div>
{% endblock %}