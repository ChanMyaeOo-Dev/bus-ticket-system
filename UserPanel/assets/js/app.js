let headBarHeight = document.querySelector(".head_bar").offsetHeight;

document.querySelector(".main_container").style.marginTop = (headBarHeight - 30) + "px";

function getHeadBarHeight() {
    return headBarHeight;
}





