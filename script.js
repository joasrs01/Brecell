console.log('teste');

// document.querySelector('#adicionar-carrinho').addEventListener('click',AdicionarCarrinho);
// document.querySelectorAll('#adicionar-carrinho').forEach(e => {e.addEventListener('click',AdicionarCarrinho);});
let itensCarrinho = document.querySelector("#itens-carrinho");
let totalCarrinho = document.querySelector("#total");

let listaItensAdicionados = [];

function AdicionarCarrinho(){

    let nomeItem = document.querySelector("#nome-item").textContent;
    let valorItem = parseFloat(document.querySelector("#valor-item").textContent);
    let bNaoExiste = true;

    listaItensAdicionados.forEach( item => {
        if( item.nome == nomeItem ){
            bNaoExiste = false;
            item.quantidade++;
        }
    } );
    
    if( bNaoExiste ){
        listaItensAdicionados.push(
            {
                nome: nomeItem,
                quantidade: 1,
                valor: valorItem
            }
        );
    }

    let sConteudo = "";
    let virgula = "";
    let sValorTotal = 0.0;

    listaItensAdicionados.forEach( item => {
        sConteudo += `${virgula}${item.nome}(${item.quantidade})`;
        virgula = ", ";

        sValorTotal += item.quantidade * item.valor;
    } );

    itensCarrinho.textContent = "Itens adicionados ao carrinho: " + sConteudo;
    totalCarrinho.textContent = "Total: " + sValorTotal;

    console.log(nomeItem);
    console.log(valorItem);
}

function AbrirCadastroMarca(){
    console.log('cadastro lof');
}