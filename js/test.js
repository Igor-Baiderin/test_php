let url = '../getTable.php';
let response =  fetch(url)
    .then(response => response.json())
    .then((data) =>  {
        console.log(data.table)
        let el = document.getElementById('tableServer')
        console.log(data.elem)
            el.outerHTML =
            '<div id="salutations">' +
            '<h1>Меняем по быстрому элемент</h1>' +
            '<p>Это будет табла, но завтра!</p>' +
            '</div>';
        console.log(el)
    })
