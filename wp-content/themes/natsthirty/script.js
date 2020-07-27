const navBar = document.getElementById('nav-bar');
const hamburger = document.getElementById('hamburger');

const toggleHamburger = () => {
    if (hamburger.classList.contains('is-active')) {
        hamburger.classList.remove('is-active');
        navBar.classList.remove('is-active');
    } else {
        hamburger.classList.add('is-active');
        navBar.classList.add('is-active');
    }
};


const handleFirstTab = (e) => {
    if (e.keyCode === 9) { // the "I am a keyboard user" key
        document.body.classList.add('user-is-tabbing');
        window.removeEventListener('keydown', handleFirstTab);
    }
};

const showMessage = (index) => {
    const author = document.getElementById('lantern_author_' + index);
    const message = document.getElementById('lantern_message_' + index);
    const lantern = document.getElementById('frame_' + index);
    lantern.classList.toggle('is-active');
    author.classList.toggle('is-active');
    if (message.classList.contains('is-active')) {
        message.classList.remove('is-active');
    } else {
        setTimeout(() => {
            message.classList.add('is-active');
        }, 1500)
    }
};

const lanternsContainer = document.querySelector('.lanterns__container');
const panels = document.querySelectorAll('.lantern__panel');

lanternsLength = lanternsContainer.children.length;
lanternsContainer.style.setProperty('--nLanterns', lanternsLength);

document.getElementById('lantern_spanel_1').classList.add('is-active');

let index = 0;
if (index < 1 && lanternsLength > 10) {
    document.getElementById('lantern_spanel_9').classList.add('is-nearly-hidden');
    document.getElementById('lantern_spanel_10').classList.add('is-almost-hidden');
    for (let i = 11; i <= lanternsLength; i++) {
        document.getElementById('lantern_spanel_' + i).classList.add('is-hidden');
    }
    ;
}

const changeButtons = (direction) => {
    if (index >= 8 && direction === 1) {
        document.getElementById('lantern_spanel_' + (index + 1)).classList.remove('is-nearly-hidden');
        document.getElementById('lantern_spanel_' + (index + 2)).classList.add('is-nearly-hidden');
        document.getElementById('lantern_spanel_' + (index + 2)).classList.remove('is-almost-hidden');
        document.getElementById('lantern_spanel_' + (index + 3)).classList.add('is-almost-hidden');
        document.getElementById('lantern_spanel_' + (index + 3)).classList.remove('is-hidden');
        document.getElementById('lantern_spanel_' + (index - 5)).classList.add('is-nearly-hidden');
        document.getElementById('lantern_spanel_' + (index - 6)).classList.remove('is-nearly-hidden');
        document.getElementById('lantern_spanel_' + (index - 6)).classList.add('is-almost-hidden');
        document.getElementById('lantern_spanel_' + (index - 7)).classList.remove('is-almost-hidden');
        document.getElementById('lantern_spanel_' + (index - 7)).classList.add('is-hidden');
    } else if (index <= lanternsLength - 9 && direction === -1) {
        document.getElementById('lantern_spanel_' + (index + 1)).classList.remove('is-nearly-hidden');
        document.getElementById('lantern_spanel_' + (index)).classList.add('is-nearly-hidden');
        document.getElementById('lantern_spanel_' + (index)).classList.remove('is-almost-hidden');
        document.getElementById('lantern_spanel_' + (index - 1)).classList.add('is-almost-hidden');
        document.getElementById('lantern_spanel_' + (index - 1)).classList.remove('is-hidden');
        document.getElementById('lantern_spanel_' + (index + 7)).classList.add('is-nearly-hidden');
        document.getElementById('lantern_spanel_' + (index + 8)).classList.remove('is-nearly-hidden');
        document.getElementById('lantern_spanel_' + (index + 8)).classList.add('is-almost-hidden');
        document.getElementById('lantern_spanel_' + (index + 9)).classList.remove('is-almost-hidden');
        document.getElementById('lantern_spanel_' + (index + 9)).classList.add('is-hidden');
    }
};

function unify(e) {
    return e.changedTouches ? e.changedTouches[0] : e
};

let xDown = null;
let yDown = null;

function lock(e) {
    xDown = unify(e).clientX;
    yDown = unify(e).clientY;
};

function move(e) {

    if (!xDown || !yDown) {
        return
    }

    console.log()

    var xUp = unify(e).clientX;
    var yUp = unify(e).clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    let direction = Math.sign(xDiff);

    if (Math.abs(xDiff) > Math.abs(yDiff)) {/*most significant*/
        if ((index > 0 || direction > 0) && (index < lanternsLength - 1 || direction < 0) && (xDiff > 75 || xDiff < -75)) {
            lanternsContainer.style.setProperty('--index', index += direction);
        }
        const spanels = document.querySelectorAll('.lanterns__spanel');
        spanels.forEach(el => el.classList.remove('is-active'));
        document.getElementById('lantern_spanel_' + (index + 1)).classList.add('is-active');
    }

    changeButtons(direction);

    xDown = null;
    yDown = null;
};

lanternsContainer.addEventListener('mousedown', lock, false);
lanternsContainer.addEventListener('touchstart', lock, false);

lanternsContainer.addEventListener('mouseup', move, false);
lanternsContainer.addEventListener('touchend', move, false);

const changeLantern = (direction) => {
    if ((index > 0 || direction > 0) && (index < lanternsLength - 1 || direction < 0)) {
        lanternsContainer.style.setProperty('--index', index += direction);
    }
    ;
    const spanels = document.querySelectorAll('.lanterns__spanel');
    spanels.forEach(el => el.classList.remove('is-active'));
    document.getElementById('lantern_spanel_' + (index + 1)).classList.add('is-active');
    changeButtons(direction);
};






