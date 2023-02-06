const tabsBox = document.querySelector(".tabs-box-scroll"),
allTabs = tabsBox.querySelectorAll(".tab-scroll"),
arrowIcons = document.querySelectorAll(".icon-scroll i");

let isDragging = false;

const handleIcons = (scrollVal) => {
    let maxScrollableWidth = tabsBox.scrollWidth - tabsBox.clientWidth;
    arrowIcons[0].parentElement.style.display = scrollVal <= 0 ? "none" : "flex";
    arrowIcons[1].parentElement.style.display = maxScrollableWidth - scrollVal <= 1 ? "none" : "flex";
}

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
       
        let scrollWidth = tabsBox.scrollLeft += icon.id === "left" ? -340 : 340;
        handleIcons(scrollWidth);
    });
});

allTabs.forEach(tab => {
    tab.addEventListener("click", () => {
        tabsBox.querySelector(".active-scroll").classList.remove("active-scroll");
        tab.classList.add("active-scroll");
    });
});

const dragging = (e) => {
    if(!isDragging) return;
    tabsBox.classList.add("dragging");
    tabsBox.scrollLeft -= e.movementX;
    handleIcons(tabsBox.scrollLeft)
}

const dragStop = () => {
    isDragging = false;
    tabsBox.classList.remove("dragging");
}

tabsBox.addEventListener("mousedown", () => isDragging = true);
tabsBox.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);