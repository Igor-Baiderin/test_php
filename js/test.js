let url = '../getTable.php';
let response =  fetch(url)
    .then(response => response.json())
    .then((data) =>  {
        console.log(data)
        let el = document.getElementById('tableServer')
        console.log(el)
        return true
    })
