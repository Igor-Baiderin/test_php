const fileMD = window.location.search.slice(6);
let url = `../articleApi.php?file=${fileMD}`;
let response = fetch(url)
    .then(response => response.json())
    .then((data) => {
        let el = document.getElementById('exampleFormControlTextarea1')
        el.innerHTML = data
        let elFile = document.getElementById('file-saving')
        elFile.value = fileMD
    })