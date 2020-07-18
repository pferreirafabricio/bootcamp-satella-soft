{% extends 'partials/body.twig.php' %}

{% block title %}Editar Thumb{% endblock %}

{% block body %}
<div class="max-width mt-3">
    <h1>Editar a thumb da receita <b>{{ receita.titulo }}</b></h1>
    <hr>
    <div class="row mb-5">
        <div class="col-12 col-md-6">
            <p class="font-weight-bold">Thumb atual</p>
            <img
                class="img-thumbnail"
                src="{{BASE}}resources/{{receita.thumb}}" 
                alt="Thumb da receita"
            >
        </div>
        <div class="col-12 col-md-6">
            <p class="font-weight-bold">Envie uma nova thumb</p>
            <form action="{{BASE}}?url=updateThumb&id={{receita.id}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="thumb">Selecione uma nova imagem:</label>
                    <input type="file" accept=".png, .jpg, .jpeg" class="form-control" id="thumb" name="thumb"></input>
                </div>
                <button class="btn btn-info" type="submit">Atualizar thumb</button>
            </form>    
        </div>
    </div>
</div>
{% endblock %}
