function myHandler(name, all, test, cave) {
    var dataAr = JSON.parse(all);
    var nomAr = JSON.parse(name);
    var getData = dataAr.filter((data) => {
        var new0 = data[1]
        var new7 = new0.replace(/â/g, "a")
        var new1 = new7.replace(/à/g, "a")
        var new2 = new1.replace(/ê/g, "e")
        var new3 = new2.replace(/é/g, "e")
        var new4 = new3.replace(/è/g, "e")
        var new5 = new4.replace(/î/g, "i")
        var new6 = new5.replace(/û/g, "u")
        var new10 = new6.replace(/ô/g, "o")
        return new10.toLowerCase().includes(nomAr.replace(/[\!]/g, " ").toLowerCase());
    });
    var get = getData.filter((g) => {
        return Number(g[11] - 1).toString().includes(test);
    });
    display(get[0], cave)
}

function display(data, cave) {
    var modale = document.querySelector('.modale');
    modale.style.height = "700px"
    var show = document.querySelector('.dataModal');
    show.textContent = ""
    var h1 = document.createElement("h1");
    h1.textContent = data[1].replace(/[\/]/g, "'")
    var p1 = document.createElement("p");
    p1.setAttribute("class", "pData")
    p1.textContent = "Quantité : " + data[2]
    p1.style.display = "block"
    var p2 = document.createElement("p");
    p2.setAttribute("class", "pData")
    p2.textContent = "Année : " + data[3]
    p2.style.display = "block"
    var p3 = document.createElement("p");
    p3.setAttribute("class", "pData")
    p3.textContent = "Appellation : " + data[5].replace(/[\/]/g, "'")
    p3.style.display = "block"
    var p4 = document.createElement("p");
    p4.setAttribute("class", "pData")
    p4.textContent = "Type : " + data[6]
    p4.style.display = "block"
    var p5 = document.createElement("p");
    p5.setAttribute("class", "pData")
    p5.textContent = "Région : " + data[7]
    p5.style.display = "block"
    var p6 = document.createElement("p");
    p6.setAttribute("class", "pData")
    p6.textContent = "Pays : " + data[9]
    p6.style.display = "block"
    var p7 = document.createElement("p");
    p7.setAttribute("class", "pData")
    p7.textContent = "Contenance : " + data[8]
    p7.style.display = "block"
    var p8 = document.createElement("p");
    p8.setAttribute("class", "pData")
    if (data[11][1]) {
        if (data[11][1] === '0') {
            p8.textContent = "Position : " + data[10] + "-" + data[11]
        } else {
            p8.textContent = "Position : " + data[10] + "-" + data[11][1]
        }
    } else {
        p8.textContent = "Position : " + data[10] + "-" + data[11][0]
    }
    p8.style.display = "block"
    var a1 = document.createElement("a");
    a1.setAttribute("class", "link add")
    a1.setAttribute("href", "/cave2/" + cave + "/editview/" + data[4].replace(/[\/]/g, "apostrophe") + "-" + data[3])
    a1.textContent = "Modifier cette bouteille"
    a1.style.display = "block"
    var a2 = document.createElement("a");
    a2.setAttribute("class", "link add")
    a2.setAttribute("href", "/cave2/" + cave + "/addpositionview/" + data[4].replace(/[\/]/g, "apostrophe") + "-" + data[3])
    a2.textContent = "Ajouter des positions pour cette bouteille"
    a2.style.display = "block"
    var a3 = document.createElement("a");
    a3.setAttribute("class", "link add")
    a3.setAttribute("href", "/cave2/" + cave + "/deleteview")
    a3.textContent = "Supprimer une bouteille dans la cave " + cave.toUpperCase()
    a3.style.display = "block"
    show.appendChild(h1);
    show.appendChild(p1);
    show.appendChild(p2);
    show.appendChild(p3);
    show.appendChild(p4);
    show.appendChild(p5);
    show.appendChild(p6);
    show.appendChild(p7);
    show.appendChild(p8);
    show.appendChild(a1);
    show.appendChild(a2);
    show.appendChild(a3);
}