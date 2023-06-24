var filterTable = [];
let url = '../getTable.php';
let response =  fetch(url)
    .then(response => response.json())
    .then((data) =>  {
        Object.assign(filterTable, data.table)
        let el = document.getElementById('tableFilter')
        let addHTML = ''
        for (let itemTable in filterTable) {
            let item = '<tr class="align-middle">' +
                '<td>'+itemTable+'</td>'+
                '<td class="d-inline-block text-truncate table-test-url">'+filterTable[itemTable].file+'</td>'+
                '<td>'+filterTable[itemTable].title+'</td>'+
                '<td class="table-test-edit"><a type="button" class="btn btn-success btn-sm" href="\edit.php">EDIT</a></td>'+
                '<td>Published</td>'+
                '<td>'+filterTable[itemTable].author+'</td>'+
                '<td>'+filterTable[itemTable].category+'</td>'+
                '<td>'+filterTable[itemTable].tool+'</td>'+
                '<td>'+filterTable[itemTable].views+'</td>'+
                '<td>'+cutMyStrMin(filterTable[itemTable].published_on, ' ')+'</td>'+
                '<td>'+cutMyStrMin(filterTable[itemTable].modified_on, ' ')+'</td>'+
                '<td class="table-test-unpublish">'+
                '<button type="button" class="btn btn-light btn-sm">UNPUBLISH</button>'+
                '</td></tr>'
            addHTML = addHTML + item
        }
        el.outerHTML = addHTML
        // console.log(data.elem)
    })
function cutMyStrMin(str, char){
    return str.replace(new RegExp(`(.*?${char}).*`), '$1')
}
