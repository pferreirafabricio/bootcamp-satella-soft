{% extends 'partials/body.twig.php' %}

{% block title %}Editar Receita{% endblock %}

{% block body %}
<div class="max-width mt-3">
    <h1>Editar Receita</h1>

    <hr>
    
    <form action="{{BASE}}?url=update&id={{receita.id}}" method="post" id="frmNovaReceita">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtTitulo">Título</label>
                    <input type="hidden" id="txtId" name="txtId" value="{{receita.id}}">
                    <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" value="{{receita.titulo}}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtTags">Tags</label>
                    <input type="text" class="form-control" id="txtTags" name="txtTags" value="{{receita.tags}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="txtConteudo">Conteúdo</label>
                    <textarea class="form-control" id="txtConteudo" rows="10" name="txtConteudo">{{receita.conteudo|raw}}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="dvalert">
                    <div class="alert alert-info">Preencha corretamente todos os campos.</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <button class="btn btn-success" type="submit">Editar</button>
            </div>
        </div>

    </form>
</div>
{% endblock %}

{% block scripts %}
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#txtConteudo'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
{% endblock %}