{% extends 'partials/body.twig.php' %}

{% block title %}Nova Receita{% endblock %}

{% block body %}
<div class="max-width mt-3">
    <h1>Nova Receita</h1>

    <hr>
    
    <form action="{{BASE}}?url=insert" method="post" id="frmNovaReceita">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtTitulo">Título</label>
                    <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" value="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtTags">Tags</label>
                    <input type="text" class="form-control" id="txtTags" name="txtTags" value="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="txtConteudo">Conteúdo</label>
                    <textarea class="form-control" id="txtConteudo" rows="10" name="txtConteudo"></textarea>
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
                <button class="btn btn-success" type="submit">Cadastrar</button>
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