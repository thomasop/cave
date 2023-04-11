const cell = document.querySelectorAll("td p")
cell.forEach(element => {
    element.parentNode.style.background = "black"
});

const cellLink = document.querySelectorAll("td a")
cellLink.forEach(element => {
    if(element.classList == "linkBoutRed") {
        element.parentNode.style.background = "red"
    }
    if(element.classList == "linkBoutWhite") {
        element.parentNode.style.background = "white"
        element.parentNode.style.border = "1px solid black"
    }
    if(element.classList == "linkBoutChamp") {
        element.parentNode.style.background = "yellow"
    }
});

var test1 = 0
var test2 = 0
var test3 = 0
var test4 = 0
var test5 = 0
var test6 = 0
var test7 = 0
var test8 = 0
var test9 = 0
var test10 = 0
var test11 = 0
var test12 = 0
var test13 = 0
var test14 = 0
var test15= 0
var test16 = 1
var arrayl = ["0", "N", "M", "L", "K", "J", "I", "H", "G", "F", "E", "D", "C", "B", "A"]
const td = document.querySelectorAll("td")
td.forEach((value, key) => {
    if (key < 10 && test1 < 10) {
        test1 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "O-" + test16)
        }
        
    }
    if (key > 9 && key < 20 && test2 < 10) {
        test2 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "N-" + test16)
        }
    }
    if (key > 19 && key < 30 && test3 < 10) {
        test3 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "M-" + test16)
        }
    }
    if (key > 29 && key < 40 && test4 < 10) {
        test4 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "L-" + test16)
        }
    }
    if (key > 39 && key < 50 && test5 < 10) {
        test5 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "K-" + test16)
        }
    }
    if (key > 49 && key < 60 && test6 < 10) {
        test6 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "J-" + test16)
        }
    }
    if (key > 59 && key < 70 && test7< 10) {
        test7 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "I-" + test16)
        }
    }
    if (key > 69 && key < 80 && test8 < 10) {
        test8 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "H-" + test16)
        }
    }
    if (key > 79 && key < 90 && test9 < 10) {
        test9 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "G-" + test16)
        }
    }
    if (key > 89 && key < 100 && test10 < 10) {
        test10 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "F-" + test16)
        }
    }
    if (key > 99 && key < 110 && test11 < 10) {
        test11 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "E-" + test16)
        }
    }
    if (key > 109 && key < 120 && test12 < 10) {
        test12 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "D-" + test16)
        }
    }
    if (key > 119 && key < 130 && test13 < 10) {
        test13 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "C-" + test16)
        }
    }
    if (key > 129 && key < 140 && test14 < 10) {
        test14 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "B-" + test16)
        }
    }
    if (key > 139 && key < 150 && test15 < 10) {
        test15 += 1
        if( value.childNodes[5]) {
            value.childNodes[5].setAttribute("name", key + 1)
            value.childNodes[5].setAttribute("value", "A-" + test16)
        }
    }
    test16 += 1
});

var submit = document.querySelector("form[name=add]")
var submit2 = document.querySelector("form[name=addOne]")
var submit3 = document.querySelector("form[name=del]")
formEror(submit)
formEror(submit2)
formEror(submit3)

function formEror (submit) {
    if(submit) {
        submit.addEventListener("submit", (e) => {
            var data = document.querySelectorAll("input[type=checkbox]")
            var init = 0;
            var count = 0;
            data.forEach(el => {
                if (el.checked == false) {
                    init++
                }
                count++;
            })
            if (init == count) {
                e.preventDefault()
                var error = document.querySelector(".errorInput")
                error.textContent = "Aucune position dans la cave a été selectionné"
            }
        })
    }
}



var select = document.querySelector("select[name=type]")
if (select) {
    if (select.getAttribute("value") != null) {
        if(select.childNodes[3].getAttribute("value") == select.getAttribute("value")) {
            select.childNodes[1].setAttribute('value', select.childNodes[3].getAttribute("value"))
            select.childNodes[1].textContent = select.childNodes[3].getAttribute("value");
        }
        if(select.childNodes[5].getAttribute("value") == select.getAttribute("value")) {
            select.childNodes[1].setAttribute('value', select.childNodes[5].getAttribute("value"))
            select.childNodes[1].textContent = select.childNodes[5].getAttribute("value");
        }
        if(select.childNodes[7].getAttribute("value") == select.getAttribute("value")) {
            select.childNodes[1].setAttribute('value', select.childNodes[7].getAttribute("value"))
            select.childNodes[1].textContent = select.childNodes[7].getAttribute("value");
        }
    }
}


var select2 = document.querySelector("select[name=region]")
if (select2) {
    if (select2.getAttribute("value") != null) {
        if(select2.childNodes[3].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[3].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[3].getAttribute("value");
        }
        if(select2.childNodes[5].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[5].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[5].getAttribute("value");
        }
        if(select2.childNodes[7].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[7].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[7].getAttribute("value");
        }
        if(select2.childNodes[9].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[9].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[9].getAttribute("value");
        }
        if(select2.childNodes[11].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[11].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[11].getAttribute("value");
        }
        if(select2.childNodes[13].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[13].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[13].getAttribute("value");
        }
        if(select2.childNodes[15].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[15].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[15].getAttribute("value");
        }
        if(select2.childNodes[17].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[17].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[17].getAttribute("value");
        }
        if(select2.childNodes[19].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[19].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[19].getAttribute("value");
        }
        if(select2.childNodes[21].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[21].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[21].getAttribute("value");
        }
        if(select2.childNodes[23].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[23].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[23].getAttribute("value");
        }
        if(select2.childNodes[25].getAttribute("value") == select2.getAttribute("value")) {
            select2.childNodes[1].setAttribute('value', select2.childNodes[25].getAttribute("value"))
            select2.childNodes[1].textContent = select2.childNodes[25].getAttribute("value");
        }
    }
}

var select3 = document.querySelector("select[name=contenance]")
if (select3) {
    if (select3.getAttribute("value") != null) {
        if(select3.childNodes[3].getAttribute("value") == select3.getAttribute("value")) {
            select3.childNodes[1].setAttribute('value', select3.childNodes[3].getAttribute("value"))
            select3.childNodes[1].textContent = select3.childNodes[3].getAttribute("value");
        }
        if(select3.childNodes[5].getAttribute("value") == select3.getAttribute("value")) {
            select3.childNodes[1].setAttribute('value', select3.childNodes[5].getAttribute("value"))
            select3.childNodes[1].textContent = select3.childNodes[5].getAttribute("value");
        }
        if(select3.childNodes[7].getAttribute("value") == select3.getAttribute("value")) {
            select3.childNodes[1].setAttribute('value', select3.childNodes[7].getAttribute("value"))
            select3.childNodes[1].textContent = select3.childNodes[7].getAttribute("value");
        }
        if(select3.childNodes[9].getAttribute("value") == select3.getAttribute("value")) {
            select3.childNodes[1].setAttribute('value', select3.childNodes[9].getAttribute("value"))
            select3.childNodes[1].textContent = select3.childNodes[9].getAttribute("value");
        }
        if(select3.childNodes[11].getAttribute("value") == select3.getAttribute("value")) {
            select3.childNodes[1].setAttribute('value', select3.childNodes[11].getAttribute("value"))
            select3.childNodes[1].textContent = select3.childNodes[11].getAttribute("value");
        }
        if(select3.childNodes[13].getAttribute("value") == select3.getAttribute("value")) {
            select3.childNodes[1].setAttribute('value', select3.childNodes[13].getAttribute("value"))
            select3.childNodes[1].textContent = select3.childNodes[13].getAttribute("value");
        }
        if(select3.childNodes[15].getAttribute("value") == select3.getAttribute("value")) {
            select3.childNodes[1].setAttribute('value', select3.childNodes[15].getAttribute("value"))
            select3.childNodes[1].textContent = select3.childNodes[15].getAttribute("value");
        }
        if(select3.childNodes[17].getAttribute("value") == select3.getAttribute("value")) {
            select3.childNodes[1].setAttribute('value', select3.childNodes[17].getAttribute("value"))
            select3.childNodes[1].textContent = select3.childNodes[17].getAttribute("value");
        }
        if(select3.childNodes[19].getAttribute("value") == select3.getAttribute("value")) {
            select3.childNodes[1].setAttribute('value', select3.childNodes[19].getAttribute("value"))
            select3.childNodes[1].textContent = select3.childNodes[19].getAttribute("value");
        }
    }
}

var select4 = document.querySelector("select[name=pays]")
if (select4) {
    if (select4.getAttribute("value") != null) {
        if(select4.childNodes[3].getAttribute("value") == select4.getAttribute("value")) {
            select4.childNodes[1].setAttribute('value', select4.childNodes[3].getAttribute("value"))
            select4.childNodes[1].textContent = select4.childNodes[3].getAttribute("value");
        }
        if(select4.childNodes[5].getAttribute("value") == select4.getAttribute("value")) {
            select4.childNodes[1].setAttribute('value', select4.childNodes[5].getAttribute("value"))
            select4.childNodes[1].textContent = select4.childNodes[5].getAttribute("value");
        }
        if(select4.childNodes[7].getAttribute("value") == select4.getAttribute("value")) {
            select4.childNodes[1].setAttribute('value', select4.childNodes[7].getAttribute("value"))
            select4.childNodes[1].textContent = select4.childNodes[7].getAttribute("value");
        }
        if(select4.childNodes[9].getAttribute("value") == select4.getAttribute("value")) {
            select4.childNodes[1].setAttribute('value', select4.childNodes[9].getAttribute("value"))
            select4.childNodes[1].textContent = select4.childNodes[9].getAttribute("value");
        }
        if(select4.childNodes[11].getAttribute("value") == select4.getAttribute("value")) {
            select4.childNodes[1].setAttribute('value', select4.childNodes[11].getAttribute("value"))
            select4.childNodes[1].textContent = select4.childNodes[11].getAttribute("value");
        }
        if(select4.childNodes[13].getAttribute("value") == select4.getAttribute("value")) {
            select4.childNodes[1].setAttribute('value', select4.childNodes[13].getAttribute("value"))
            select4.childNodes[1].textContent = select4.childNodes[13].getAttribute("value");
        }
    }
}