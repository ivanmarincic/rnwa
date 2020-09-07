(function () {

    function onMouseOut($event){
        var tooltip = document.getElementById("tooltip");
        tooltip.innerHTML = null;
        tooltip.classList.remove("active");
        $event.targer.removeEventListener(onMouseOut);
    }

    var tds = document.getElementsByTagName("td")
    for (var i=0; i<tds.length; i++) {
        tds[i].addEventListener("mouseover", function($event) {
            var tooltip = document.getElementById("tooltip");
            tooltip.innerHTML = $event.target.parentElement.outerHTML;
            tooltip.style.left = $event.clientX + 10 + "px";
            tooltip.style.top = $event.clientY + 10 + "px";
            tooltip.classList.add("active")
            $event.target.addEventListener("mouseout", onMouseOut)
        })
    }
})()
