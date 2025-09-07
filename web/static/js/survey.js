let getProgress = () => {
    return $('.progress');
}

let setProgress = (step) => {
    getProgress().css('width', `calc(100% / 8 * ${step})`);
}

$(document).on('pjax:complete', function() {
    let step = $('.step-legend').data('step');
    setProgress(step)

    $('.spage-footer .actions').on('click', 'button, a', function (e) {
        let step = $('.step-legend').data('step');
        let target = $(e.target);

        if (target.is('button')) {
            step += 1;
        } else if (target.is('a')) {
            step -= 1;
        }

        setProgress(step)
    });
})