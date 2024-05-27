function adicionarCampos(){

    let camposContainer = document.getElementById('fant2');

    let novoCampoDiv = document.createElement('div');

    let novoCampoAtividade = document.createElement('input');
    novoCampoAtividade.type = 'text';
    novoCampoAtividade.name = 'atividade'+'[]';
    novoCampoAtividade.placeholder = 'atividade';

    let novoCampoDesc = document.createElement('input');
    novoCampoDesc.type = 'text';
    novoCampoDesc.name = 'descricao'+'[]';
    novoCampoDesc.placeholder = 'descricao';

    let novoCampoObjetivo = document.createElement('input');
    novoCampoObjetivo.type = 'text';
    novoCampoObjetivo.name = 'objetivo'+'[]';
    novoCampoObjetivo.placeholder = 'objetivo';

    let novoCampoInicio = document.createElement('input');
    novoCampoInicio.setAttribute("type", "date","name",'inicio'+'[]');


    let novoCampoTermino = document.createElement('input');
    novoCampoTermino.setAttribute("type", "date","name",'termino'+'[]');

    novoCampoDiv.appendChild(novoCampoAtividade);
    novoCampoDiv.appendChild(novoCampoDesc);
    novoCampoDiv.appendChild(novoCampoObjetivo);
    novoCampoDiv.appendChild(novoCampoInicio);
    novoCampoDiv.appendChild(novoCampoTermino);

    camposContainer.appendChild(novoCampoDiv);

}