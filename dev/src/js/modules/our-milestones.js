if (document.querySelector('.our-milestones')) {
    const milestoneItems = $('.milestone-container');
    const listItem = $('.our-milestones li');
    milestoneItems.hide()

    $('.our-milestones__item-1__content').show();
    $('.our-milestones li').hover(hvrIn, hvrOut)

    function hvrIn() {

        if ($(this).hasClass('active')) {
            return null;
        }

        const that = $(this)[0].classList.value;
        listItem.each(function () {
            $(this).removeClass('active')
        })
        $(this).addClass('active')
        milestoneItems.hide()
        $(`.${that}__content`).show();
    }

    function hvrOut() {

    }
}