function flip(e){
    if (e.style.transform == "rotateY(180deg)") {
        e.style.transform = "rotateY(0)";
    }else{
        e.style.transform = "rotateY(180deg)";
    }
}

const game = document.body.querySelector('.game');

for (let i = 0; i <= 19; i++) {
    const create = document.createElement('div');
    const inner = document.createElement('div')
    const outer = document.createElement('div')

    create.setAttribute("class", "containerSquare");
    create.setAttribute("onclick", "flip(this)");
    game.appendChild(create)

    inner.setAttribute('class', 'innerSquare')
    inner.innerHTML = "hello face"
    create.appendChild(inner)
    
    outer.setAttribute('class', 'outerSquare')
    outer.innerHTML = "hello pile"
    create.appendChild(outer)
    
    console.log(create);
}