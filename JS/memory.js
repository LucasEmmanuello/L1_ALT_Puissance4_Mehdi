function flip(e){
    if (e.style.transform == "rotateY(0)") {
        e.style.transform = "rotateY(180deg)"
    }
    if (condition) {
        
    }
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

let images = shuffleArray(['potitemidas', 'potitcasque', 'potitebmb', 'potitectrll', 'potitelune', 'potitemercure', 'potitieplanetrose', 'potiteroot', 'potitestar', 'potitftm', 'potitjackal', 'potitjupiter', 'potitmars', 'potitneptune', 'potitnormandy', 'potitsablier', 'potitsablier', 'potitsablier', 'potitsoleil', 'potittrounoir', 'potituranus', 'potitvaisseaugentil', 'potitvaisseaumechant'])
let difficulty = 1

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