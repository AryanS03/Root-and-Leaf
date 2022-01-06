const click = document.querySelector("#click");
const addImages = document.querySelector("#addImages");
click.addEventListener("click", (e) => {
    addImages.scrollIntoView({
        behavior: "smooth",
    });
});
