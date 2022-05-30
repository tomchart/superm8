window.fetchData = function () {
    //Search Value
    const val = document.getElementById("search").value;

    //Search Url
    const url = "/search?search=" + val;

    fetch(url)
        .then((resp) => resp.json()) //Transform the data into json
        .then(function (data) {
            // get table body element
            var tbodyref = document.getElementById("tbodyfordata");
            tbodyref.innerHTML = "";

            let media = data;
            // map data from media to row
            media.map(function (media) {
                let tr = createNode("tr"),
                    title = createNode("td"),
                    year = createNode("td"),
                    director = createNode("td");
                tr.className = "hover";
                title.innerText = media.Title;
                year.innerText = media.Year;
                director.innerText = media.Director;
                // and append to element
                append(tr, title);
                append(tr, year);
                append(tr, director);
                append(tbodyref, tr);

                // if result clicked populate value of input field
                tr.onclick = function () {
                    document.getElementById("search").value = media.Title;
                };
            });
        })
        .catch(function (error) {
            console.log(error);
        });
};

function createNode(element) {
    return document.createElement(element);
}

function append(parent, el) {
    return parent.appendChild(el);
}
