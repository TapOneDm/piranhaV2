let getProgress = () => {
    return $('.progress');
}

let setProgress = (step) => {
    if (step <= 8) {
        getProgress().css('width', `calc(100% / 8 * ${step})`);
    }
}

$(document).on('pjax:complete', function() {
    let step = $('.step-legend').data('step');
    setTimeout(() => setProgress(step), 50);

    $('.spage-footer .actions').on('click', 'button, a', function (e) {
        let step = $('.step-legend').data('step');
        let target = $(e.target);

        if (target.is('button')) {
            step += 1;
            target.html('<span class="loader"></span>');
        } else if (target.is('a')) {
            step -= 1;
            target.html('<span class="loader alt"></span>');
        }


        setTimeout(() => setProgress(step), 50);
    });
})