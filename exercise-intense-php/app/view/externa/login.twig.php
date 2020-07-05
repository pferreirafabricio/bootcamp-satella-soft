{% extends "externa/partial.twig.php" %}

{% block body %}
<div class="main-container">
    <div class="max-width vertical-center">
        <form action="{{BASE}}?url=auth" method="post">
            <p>Informe seu CPF para continuar</p>
            <input type="text" name="txtCpf" id="txtCpf">
            <div class="ar">
                <a href="{{BASE}}?url=cadastro">Criar conta</a>
            </div>
        </form>
    </div>
</div>
{% endblock %}