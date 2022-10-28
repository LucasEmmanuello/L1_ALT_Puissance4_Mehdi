let num = 0
let eprce = 0

function flip(e){
    console.log(eprce)
    if (cartes['0']['return'] == 0) {
        cartes['0']['return'] = 1
    } else if (cartes['0']['return'] == 1 && cartes['0']['return'] !== cartes['1']['return']) {
        cartes['0']['return'] = 0
        setTimeout(() => {e.style.transform = "rotateY(0)"}, 750)
    }

    // console.log('ff', cartes['0']['return'])

    if (e.style.transform == "rotateY(180deg)") {
    } else {
        e.style.transform = "rotateY(180deg)"
    }
    
    if (returne == 1) {
        num = 1
    }
    if (num !== 0){
        if (returne == num) {
            e.style.transform = "rotateY(180deg)"
        } else{
            setTimeout(() => {e.style.transform = "rotateY(0)"}, 750)
            returne = 0
            num = 0
        }
    }
    eprce = e.getElementsByTagName['1']
}

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
    
        // Generate random number
        var j = Math.floor(Math.random() * (i + 1));
                    
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
        
    return array;
 }

let images = shuffleArray(['potitemidas', 'potitcasque', 'potitebmb', 'potitectrll', 'potitelune', 'potitemercure', 'potiteplanetrose', 'potiteroot', 'potitestar', 'potitftm', 'potitjackal', 'potitjupiter', 'potitmars', 'potitneptune', 'potitnormandy', 'potitsablier', 'potitsablier', 'potitsablier', 'potitsoleil', 'potittrounoir', 'potituranus', 'potitvaisseaugentil', 'potitvaisseaumechant'])
let difficulty = 1
let returne = 0
let cartes = [
    {'num': 0, 'return': 0},
    {'num': 0, 'return': 0}
]


console.log(cartes['0']['return'])

if (difficulty == 1) {
    lala = images.length - (images.length - 2)
    console.log(lala)
    images = images.slice(0, lala)
}



    for (let a = 0; a < 2; a++) {
        const game = document.body.querySelector('.game-table')
        const br = document.createElement('tbody')
        game.appendChild(br)
        const tr = document.createElement('tr')
        br.appendChild(tr)
        const create = document.createElement('td')
        tr.appendChild(create)
        tr.setAttribute('class', 'br')

        for (let i = 0; i < 2; i++) {
            const div = document.createElement('div')
            const inner = document.createElement('div')
            const outer = document.createElement('div')
            const img = document.createElement('img')
    

            div.setAttribute("class", "containerSquare")
            div.setAttribute("onclick", "flip(this)")
            create.appendChild(div)
    
            inner.setAttribute('class', 'innerSquare')
            div.appendChild(inner)
            
            outer.setAttribute('class', 'outerSquare')
            
            img.setAttribute('src', "/assets/images/" + images[i] + '.png')
            
            img.setAttribute('class', 'img-memo')

            outer.appendChild(img)

            div.appendChild(outer)
            
        }
        // i = 0
    }
    const headerTchat = document.body.querySelector(".header-tchat");
const bodyTchat = document.body.querySelector(".body-tchat");
const footerTchat = document.body.querySelector(".footer-tchat");

function click(){
    if(bodyTchat.clientHeight > 0 ){
    bodyTchat.style.display = 'none';
    footerTchat.style.display = 'none';
    }else{
        bodyTchat.style.display = 'block';
        footerTchat.style.display = 'flex';
    }
}

headerTchat.addEventListener("click", click);