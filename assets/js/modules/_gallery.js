import SwipeListener from 'swipe-listener';

class Gallery {
    constructor(selector){
        this.container = document.querySelector(selector);
        this.listener = SwipeListener(this.container);
        this.images = document.querySelectorAll(selector+' img');
        this.activePos = 0;

        this.arrows = this.addArrows();
        this.arrowPrev = this.arrows[0];
        this.arrowNext = this.arrows[1];

        this.events();
    }

    events() {
        this.arrowPrev.addEventListener('click', this.prev.bind(this));

        this.arrowNext.addEventListener('click', this.next.bind(this));

        this.container.addEventListener('swipe', (e) => {
            let directions = e.detail.directions;

            if (directions.left)
                this.next();

            if (directions.right)
                this.prev();
        });
    }

    addArrows(){
        let arrowPrev = document.createElement('div');
        arrowPrev.classList.add('gallery__arrow');
        arrowPrev.classList.add('gallery__arrow--prev');
        let arrowNext = document.createElement('div');
        arrowNext.classList.add('gallery__arrow');
        arrowNext.classList.add('gallery__arrow--next');

        this.container.appendChild(arrowPrev);
        this.container.appendChild(arrowNext);

        return [arrowPrev, arrowNext];
    }

    next(){
        if (this.activePos === this.images.length - 1)
            this.activePos = -1;

        this.images.forEach((image, index)=>{

            let displacement = (index - this.activePos - 1)*100;
            image.setAttribute("style", "transform: translateX(" + displacement + "%);");
        });

        this.activePos += 1;
    }

    prev(){
        if (this.activePos === 0)
            this.activePos = this.images.length;

        this.images.forEach((image, index)=>{

            let displacement = (index - this.activePos + 1)*100;
            image.setAttribute("style", "transform: translateX(" + displacement + "%);");
        });

        this.activePos -= 1;

    }

    // init(){
    //     this.images.forEach((image, index)=>{
    //         let displacement = index*100;
    //         image.setAttribute("style", "transform: translateX(" + displacement + "%);");
    //     });
    // }
}

export default Gallery;