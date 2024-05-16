function imprimirTabela() {
    let tabela = document.getElementById('tabela-relatorio').outerHTML;
    let janelaImprimir = window.open('', '', 'width=800,height=600');
    janelaImprimir.document.write('<html><head><title>Tabela para Impressão</title>');
    janelaImprimir.document.write('    <link rel="stylesheet" href="./Styles/relatorio.css">')
    janelaImprimir.document.write('</head><body>');
    janelaImprimir.document.write(tabela);
    janelaImprimir.document.write('</body></html>');
    janelaImprimir.document.close();
    janelaImprimir.print();
  }