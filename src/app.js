window.onload = function () {
    class App {
        constructor() {
            this.rightFighters = []
            this.leftFighters = []
            this.fighterLeft = -1
            this.fighterRight = -1
        }

        init() {
            const rightFighters = document.getElementById("rightCats").children
            const leftFighters = document.getElementById("leftCats").children

            const firstSide = document.getElementById('firstSide')
            const secondSide = document.getElementById('secondSide')

            for (let ind = 0; ind < leftFighters.length; ind++) {
                const cat = new Cat(leftFighters[ind], rightFighters[ind])
                cat.init()
                const rightCatSide = new CatInfo(cat, rightFighters[ind], secondSide)
                const leftCatSide = new CatInfo(cat, leftFighters[ind], firstSide)
                rightCatSide.init()
                leftCatSide.init()
                this.rightFighters.push(rightCatSide)
                this.leftFighters.push(leftCatSide)
            }

            this.allCats = [...this.rightFighters, ...this.leftFighters]

            this.allCats.forEach(cat=>{
                cat.fighter.addEventListener('click', e => {
                    const rightIndex = this.rightFighters.indexOf(cat)
                    const leftIndex = this.leftFighters.indexOf(cat)
                    if (rightIndex !== -1) {
                        this.fighterRight = this.fighterClick(this.rightFighters, rightIndex)
                    } else if (leftIndex !== -1) {
                        this.fighterLeft = this.fighterClick(this.leftFighters, leftIndex)
                    }
                }, false)
            })

            document.getElementById("randomFight").addEventListener('click', e => {
                let rightRandom = Math.floor(Math.random() * this.rightFighters.length);
                let leftRandom = Math.floor(Math.random() * this.leftFighters.length);
                this.fighterRight = this.fighterClick(this.rightFighters, rightRandom)
                this.fighterLeft = this.fighterClick(this.leftFighters, leftRandom)
            }, false)
        }


        fighterClick(fighter, ind) {
            fighter[ind].click()
        }
    }

    class Cat {
        constructor(first, second) {
            this.first = first.getElementsByClassName('fighter-box')[0]
            this.second = second.getElementsByClassName('fighter-box')[0]
        }

        init() {
            const data = this.first.getAttribute('data-info')
            this.info = JSON.parse(data)

            this.image = this.first.getElementsByTagName('img')[0].getAttribute('src')
            const imageDiv = document.createElement('div')
            imageDiv.classList.add('image_overlay')
            this.first.appendChild(imageDiv.cloneNode())
            this.second.appendChild(imageDiv)
        }
    }

    class CatInfo {
        constructor(cat, fighter, about) {
            this.cat = cat
            this.fighter = fighter
            this.about = about
        }

        init() {
            this.nameElement = this.about.getElementsByClassName('name')[0]
            this.ageElement = this.about.getElementsByClassName('age')[0]
            this.skillsElement = this.about.getElementsByClassName('skills')[0]
            this.recordElement = this.about.getElementsByClassName('record')[0]
            this.imgElement = this.about.getElementsByClassName('featured-cat-fighter-image')[0]
        }

        click() {
            this.nameElement.innerText = this.cat.info.name
            this.ageElement.innerText = this.cat.info.age
            this.skillsElement.innerText = this.cat.info.catInfo
            this.recordElement.innerText = "Wins: " + this.cat.info.record.wins + " Loss: " + this.cat.info.record.loss
            this.imgElement.setAttribute('src', this.cat.image)
        }
    }


    const app = new App()
    app.init()
}
