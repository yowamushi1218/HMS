const form = document.querySelector("form");
const nextBtn = form.querySelector(".nextBtn");
const backBtn = form.querySelector(".backBtn");
const allInput = form.querySelectorAll(".first input");

nextBtn.addEventListener("click", () => {
    let isFilled = true;
    allInput.forEach(input => {
        if (input.value.trim() === "") {
            isFilled = false;
            return;
        }
    });

    if (isFilled) {
        form.classList.add('secActive');
    }
});

backBtn.addEventListener("click", () => form.classList.remove('secActive'));
