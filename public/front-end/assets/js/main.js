// increment/decrement quantity input value
document.querySelector(".minus-btn").setAttribute("disabled", "disabled");
var valueCount;
document.querySelector(".plus-btn").addEventListener("click", function () {
    valueCount = document.getElementById("quantity").value;
    valueCount++;
    document.getElementById("quantity").value = valueCount;
    if (valueCount > 1) {
        document.querySelector(".minus-btn").removeAttribute("disabled");
        document.querySelector(".minus-btn").classList.remove("disabled");
    }
});
document.querySelector(".minus-btn").addEventListener("click", function () {
    valueCount = document.getElementById("quantity").value;
    valueCount--;
    document.getElementById("quantity").value = valueCount;
    if (valueCount == 1) {
        document
            .querySelector(".minus-btn")
            .setAttribute("disabled", "disabled");
    }
});

// Product description image slider
const imgs = document.querySelectorAll(".img-select a");
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener("click", (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage() {
    const displayWidth = document.querySelector(
        ".img-showcase img:first-child"
    ).clientWidth;
    document.querySelector(".img-showcase").style.transform = `translateX(${
        -(imgId - 1) * displayWidth
    }px)`;
}
window.addEventListener("resize", slideImage);
