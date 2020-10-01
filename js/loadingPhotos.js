$(document).ready(
    function loadphoto() {
        var t = true;
        if ($('#test').position().top < $(document).scrollTop() + $(window).height() && t) {
            // console.log($(window).scrollTop());
            t = false;
            console.log(true);
        }


    },


)



















































































let options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.4
}

let loadPhoto = (entry, observer) => {
    entry.forEach(element => {
        console.log(element.intersectionRatio)
        if (element.intersectionRatio >= 0.4)
            console.log(element.target.src = element.target.dataset.src);
    });

    // entry.target.src = entry.target.dataset.src;
}

let observer = new IntersectionObserver(loadPhoto, options);
let allLazies = document.querySelectorAll('.lazyload');
allLazies.forEach(target => {
    observer.observe(target);
    console.log('added')
});