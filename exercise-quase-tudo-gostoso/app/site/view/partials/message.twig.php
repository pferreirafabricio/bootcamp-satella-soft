{% extends 'partials/body.twig.php' %}

{% block title %}

{{title}}

{% endblock %}


{% block body %}
<div class="max-width mt-3">
    <h1>{{title}}</h1>

    <h2>{{message}}</h2>
</div>
{% endblock %}