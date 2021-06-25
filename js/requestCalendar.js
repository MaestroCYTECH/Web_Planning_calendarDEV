function goTo(incr) {
    console.log(parseInt(incr))
} 

for (btn of document.getElementsByClassName("btn-change")) {
    btn.addEventListener("click", function () {
        goTo(this.value)
    })
}