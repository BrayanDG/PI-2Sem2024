<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMOLOG</title>
    <link rel="stylesheet" href="../../Styles/styles.css">
    <link rel="stylesheet" href="../../Styles/relatorio.css">
    <script src="./Scripts/caixaselection.js"></script>
</head>
<body>
    <header>
        <div>
            <div class="logos">
                <a href="#"> 
                    <img src="../../Imagens/Fatec.png" alt="Fatec Logo">
                </a>
            </div>
            <div class="logos">
                <a href="#"> 
                    <img src="../../Imagens/CPS.png" alt="CPS Logo"id="cps-logo">
                </a>
            </div>

        </div>
        <div class="centro-menu">
            <div id="user-active">
                <img src="../../Imagens/user-photo.png" alt="">
                <Span>Jeremias</Span>
            </div>
            <img src="../../Imagens/design-bar.png" alt="barra-de-design" id="barra-design">
        </div>
        <nav>
            <ul class="menu">
                    <li><a href="Inicio.html">Início</a></li>
                    <li><a href="AlterarDados.html">Alterar Dados Cadastrais</a></li>
                    <li class="dropdown""><a href="Estagio.html">Estágio</a>
                        <div class="dropdown-menu">
                            <a href="#">Fase 1 - Solicitação</a>
                            <a href="#">Fase 2 - Aprovação</a>
                            <a href="#">Fase 3 - Conclusão</a>
                        </div>    
                    </li>
                    <li><a href="Relatorio.html">Relatórios</a></li>
                    <li id="exitb"><a href="Login.html">Sair</a></li>
                </ul>
        </nav>    
    </header>
    <Div >
        <div id="relatorio">
            <table id="tabela-relatorio">
                <thead>
                    <tr>
                        <th col-index = 1>RA</th>
                        <th col-index = 2>Nome</th>
                        <th col-index = 3>Documentação</th>
                        <th col-index = 4>Situação</th>
                        <th col-index = 5>Nota Final</th>
                    </tr>
                </thead>
                <tbody id="bordas">
                    <tr>
                        <td>2780642223006</td>
                        <td>LUIZ GUSTAVO OLIVEIRA MESQUITA</td>
                        <td><a href="./aluno/luiz.html" type="button">DOCUMENTOS</button></td>
                        <td align="center"><input type="text" disabled></td>
                        <td align="center">10</td>
                    </tr>
                    <tr>
                        <td>2780642213012</td>
                        <td>TALES ARIEL RODRIGUES</td>
                        <td><a href="#" type="button">DOCUMENTOS</button></td>
                        <td align="center"><input type="text" disabled></td>
                        <td align="center">9</td>
                    </tr>
                    <tr>
                        <td>2780642123018</td>
                        <td>FELIPE CODOGNO FRANCATO</td>
                        <td><a href="#" type="button">DOCUMENTOS</button></td>
                        <td align="center"><input type="text" disabled></td>
                        <td align="center">8</td>
                    </tr>
                    <tr>
                        <td>2780642023085</td>
                        <td>CONCEIÇÃO DE SILVA</td>
                        <td><a href="#" type="button">DOCUMENTOS</button></td>  
                        <td align="center"><input type="text" disabled></td>
                        <td align="center">7</td>
                    </tr>
                    <tr>
                        <td>2780642023028</td>
                        <td>INGRIDI CONCEIÇÃO DE CARVALHO</td>
                        <td><a href="#" type="button">DOCUMENTOS</button></td>
                        <td align="center"><input type="text" disabled></td>
                        <td align="center">6.5</td>
                    <tr>
                        <td>2780642123016</td>
                        <td>JOSEMARY CRISTIANE DE OLIVEIRA LOPES</td>
                        <td><a href="#" type="button">DOCUMENTOS</button></td>
                        <td align="center"><input type="text" disabled></td>
                        <td align="center">6</td>
                    </tr>

                </tbody>
            </table>
            
        </div>
       
    </Div>

</body>
</html>