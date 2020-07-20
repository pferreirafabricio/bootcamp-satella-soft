{% extends "externa/partial.twig.php" %}

{% block body %}
<div class="main-container">
    <div class="max-width vertical-center">
        <form id="frmLogin" action="{{BASE}}?url=auth" method="post">
            <p>Informe seu CPF para continuar</p>
            <input type="text" name="txtCpf" id="txtCpf">
            <div>
                <button class="btn" type="submit">Entrar</button>
                <a style="margin-left: auto;" href="{{BASE}}?url=cadastro">Criar conta</a>
            </div>
        </form>
    </div>
</div>
{% block script %} 
    <script type="module" src="{{BASE}}assets/js/login.js"></script> 
{%endblock %}
{% endblock %}