function adicionarCampos(){

    const camposContainer = document.getElementById('fant2');

    const novoCampoDiv = document.createElement('div');

    const novoCampoAtividade = document.createElement('input');
    novoCampoAtividade.type = 'text';
    novoCampoAtividade.name = 'atividade[]';
    novoCampoAtividade.placeholder = 'atividade';

    const novoCampoDesc = document.createElement('input');
    novoCampoDesc.type = 'text';
    novoCampoDesc.name = 'descricao[]';
    novoCampoDesc.placeholder = 'descricao';

    const novoCampoObjetivo = document.createElement('input');
    novoCampoObjetivo.type = 'text';
    novoCampoObjetivo.name = 'objetivo[]';
    novoCampoObjetivo.placeholder = 'objetivo';

    const novoCampoInicio = document.createElement('input');
    novoCampoInicio.setAttribute("type", "date","name","inicio[]");


    const novoCampoTermino = document.createElement('input');
    novoCampoTermino.setAttribute("type", "date","name","termino[]");

    novoCampoDiv.appendChild(novoCampoAtividade);
    novoCampoDiv.appendChild(novoCampoDesc);
    novoCampoDiv.appendChild(novoCampoObjetivo);
    novoCampoDiv.appendChild(novoCampoInicio);
    novoCampoDiv.appendChild(novoCampoTermino);

    camposContainer.appendChild(novoCampoDiv);

}