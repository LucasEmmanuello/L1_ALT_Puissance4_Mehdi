// const mySquare = document.body.querySelector('.containerSquare')
// const game = document.body.querySelector('.game');
// const first = document.body.querySelector("#first");
// const two = document.body.querySelector("#two");
// const three = document.body.querySelector("#three");
// const four = document.body.querySelector("#four");

// // mySquare.style.backgroundColor = "#fff";
 const Button = document.body.querySelector(".play-button");
// // let play = 0; 
// // var loop = setInterval(function() { 
// //     if(mySquare.style.backgroundColor === "red") { 
// //         mySquare.style.backgroundColor = "blue";
// //         mySquare.style.transform = "translateX(200px)";
// //     }else{
// //         mySquare.style.backgroundColor = "red";
// //         mySquare.style.transform = "translateX(0)";
// //     }
// // }, 500); 

// // Button.addEventListener("click", () => {
// //     if (play == 1) {
// //         Button.value = "Play";
// //         play = 0;
// //     } else if (play == 0) {
// //         Button.value = "Pause";
// //         play = 1;
// //     }
// // })

// // mySquare.forEach(element => {
// //     console.log();
// // });

// // var loop = setInterval(() => {
// //     if (play ==1) {
// //         if (mySquare.style.transform == "translateX(250px) translateY(0px)") {
// //             mySquare.style.transform = "translateX(250px) translateY(250px)";
// //             mySquare.style.backgroundColor = "red";
// //         } else if (mySquare.style.transform == "translateX(250px) translateY(250px)") {
// //             mySquare.style.backgroundColor = "green";
// //             mySquare.style.transform = "translateX(0px) translateY(250px)";
// //         }
// //         else if (mySquare.style.transform == "translateX(0px) translateY(250px)") {
// //             mySquare.style.backgroundColor = "#fff";
// //             mySquare.style.transform = "translateX(0px) translateY(0px)";
// //         } else {
// //             mySquare.style.transform = "translateX(250px) translateY(0px)";
// //         }
// //     }
// // }, 250);

// const cards = {
//     one: {
//         target: 0, // ELement HTML // default null
//         isFlipped: false,
//         data: "Pomme", // default null
//     },
//     two: {
//         target: 0, // ELement HTML
//         isFlipped: false,
//         data: "Pomme", // default null
//     }
// }


// function flip(e){
//     if (e.style.transform == "rotateY(180deg)") {
//         e.style.transform = "rotateY(0)";
//     }else{
//         e.style.transform = "rotateY(180deg)";
//     }
// }

// for (let i = 0; i <= 19; i++) {
//     const create = document.createElement('div');
//     const inner = document.createElement('div')
//     const outer = document.createElement('div')

//     create.setAttribute("class", "containerSquare");
//     create.setAttribute("onclick", "flip(this)");
//     game.appendChild(create)

//     inner.setAttribute('class', 'innerSquare')
//     inner.innerHTML = "hello face"
//     create.appendChild(inner)
    
//     outer.setAttribute('class', 'outerSquare')
//     outer.innerHTML = "hello pile"
//     create.appendChild(outer)
    
//     console.log(create);
// }

// function randrange(min, max){
//     return Math.round(Math.random() * (max - min) + min)
// }

// let nbplay = 1
// const nbaleatoire = randrange(1,100)
// const submit = document.body.querySelector('#submit')
// let error = ''
// let table = ''
// Button.style.visibility = ('hidden')

// submit.addEventListener("click", () => {
//     let number = document.getElementById('number').value
//     if (number >= 1 && number <= 100) {
//         nbplay = nbplay + 1
//         if (table != '') {
//             table = table + ', ' + number
//         } else {
//             table = number
//         }
//         if (nbaleatoire == number) {
//             console.log("ok")
//             document.body.querySelector('#number').setAttribute('disabled', '')
//             document.body.querySelector('#submit').setAttribute('disabled', '')
//             document.body.querySelector('.felicitation').innerHTML = ("Felicitations 🎉🎉")
//             document.body.querySelector('.felicitation').style.visibility = ("visible")
//             document.body.querySelector('.felicitation').style.background = ("green")
//             Button.style.visibility = ('visible')
//         } else if (nbaleatoire > number) {
//             document.body.querySelector('.felicitation').innerHTML = ("Plus haut ⬆️")
//             document.body.querySelector('.felicitation').style.visibility = ("visible")
//         } else if (nbaleatoire < number) {
//             document.body.querySelector('.felicitation').innerHTML = ("Plus bas ⬇️")
//             document.body.querySelector('.felicitation').style.visibility = ("visible")
//         }
//         if (nbplay >= 11) {
//             document.body.querySelector('#number').setAttribute('disabled', '')
//             document.body.querySelector('#submit').setAttribute('disabled', '')
//             document.body.querySelector('.felicitation').innerHTML = ("Raté 😂😂")
//             document.body.querySelector('.felicitation').style.visibility = ("visible")
//             document.body.querySelector('.felicitation').style.background = ("red")
//             Button.style.visibility = ('visible')
//         }
//         document.body.querySelector('.number').innerHTML = (table)
//     }
// })
//console.log(radio)


function Submit(e) {
    let error1 = ""
    const email = document.body.querySelector("#email").value
    const tel = document.body.querySelector("#tel").value
    const name = document.body.querySelector("#name").value
    const pickup = document.body.querySelector("#pickup").value
    const car = document.body.querySelector("#car").checked
    const van = document.body.querySelector("#van").checked
    const tuktuk = document.body.querySelector("#tuktuk").checked
    const baby = document.body.querySelector("#baby").checked
    const wheelchair = document.body.querySelector("#wheelchair").checked
    const stocktip = document.body.querySelector("#stocktip").checked

     let regex = new RegExp('^[^\s@]+@[^\s@]+\.[^\s@]+$')
    if (email !== "") {
        if (regex.test(email)) {
            if (tel.length = 10) {
                if (name !== "") {
                    if (!car && !van && !tuktuk) {
                        error1 = "Veuillez cocher au moins une case"
                    } else {
                        if (baby || wheelchair || stocktip) {
                            if (pickup != "select") {
                                
                            } else {
                                error1 = "Veuillez select"
                            }
                        } else {
                            error1 = "Veuillez cocher au moins une case"
                        }
                    }
                } else {
                    error1 = "Veuillez indiquer un nom"
                }
            } else {
                error1 = "orh"
            } 
        } else{
            error1 = "Vous avez saisi un email non valide !"
        }
    } else{
        error1 = "Renseignez votre email"
    }
    console.log(error1)
}