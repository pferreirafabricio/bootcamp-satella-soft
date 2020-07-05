{% extends "externa/partial.twig.php" %}

{% block body %}
<div class="main-container">
    <div class="max-width vertical-center">

        <div class="grid-100">
            <h1>Criar conta</h1>
        </div>

        <form action="{{BASE}}?url=register" method="post" id="frmRegistro">
            <div class="grid-50">
                <label for="txtCpf">CPF</label>
                <input type="text" id="txtCpf" name="txtCpf">
            </div>

            <div class="grid-50">
                <label for="txtNome">Nome</label>
                <input type="text" id="txtNome" name="txtNome">
            </div>

            <div class="grid-50">
                <label for="txtEmail">E-mail</label>
                <input type="email" id="txtEmail" name="txtEmail">
            </div>

            <div class="grid-50">
                <label for="txtNascimento">Nascimento</label>
                <input type="text" id="txtNascimento" name="txtNascimento">
            </div>

            <div class="grid-100 align-right">
                <button class="btn" type="submit">Criar</button>
            </div>

            <div class="clear"></div>
        </form>
    </div>
</div>
{% endblock %}