// SET
localStorage.setItem('nome', 'Edinei')
localStorage.nome = 'Edinei'

// GET
localStorage.getItem('nome')
localStorage.nome

// REMOVE
localStorage.removeItem('nome')

if(typeof localStorage.nome == 'undefined') {
    localStorage.nome = prompt("Qual o seu nome?")
}

document.getElementById('info').innerHTML = localStorage.nome