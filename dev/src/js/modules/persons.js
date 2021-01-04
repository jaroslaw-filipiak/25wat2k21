personWidth = () => {
    var persons = document.querySelectorAll('.person'),
        personsContainer = document.querySelector('.we-and-our-friends').offsetWidth,
        personsLength = persons.length,
        difference = personsContainer / personsLength

    if (window.innerWidth >= 1200) {
        persons.forEach(person => {
            person.style.width = `${difference}px`
        });
    } else {
        persons.forEach(person => {
            person.style.width = ``
        });
    }

}

$(window).resize(function () {
    personWidth();
})

if (document.querySelector('.we-and-our-friends')) {
    personWidth();
}


if ($(window).width() >= 1200) {
    $('.person').hover(personHvrIn, personHvrOut);
}

$(window).resize(function () {
    if ($(window).width() >= 1200) {
        $('.person').hover(personHvrIn, personHvrOut);
    } else {
        $('.person').unbind('mouseenter mouseleave')
    }
});

function personHvrIn() {
    $(this).addClass('person-hover');
    $(this).find('img').stop(true, true).fadeIn(100);
    $(this).find('.person-info').removeClass('person__not-visible');
    $(this).find('.person-info').addClass('person__visible');
}

function personHvrOut() {
    $(this).removeClass('person-hover');
    $(this).find('img').stop(true, true).fadeOut(100);
    $(this).find('.person-info').addClass('person__not-visible');
    $(this).find('.person-info').removeClass('person__visible');
}