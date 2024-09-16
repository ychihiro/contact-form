const feedbackElements = document.querySelectorAll(".feedback");

feedbackElements.forEach((element) => {
    const text = element.textContent;
    const maxLength = 15;

    if (text.length > maxLength) {
        element.textContent = text.substring(0, maxLength) + "...";
    }
});
