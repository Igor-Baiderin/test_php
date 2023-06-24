var filterTable = [];
var dataTable = [];
let url = '../getTable.php';
let response = fetch(url)
    .then(response => response.json())
    .then((data) => {
        Object.assign(dataTable, data.table)
        Object.assign(filterTable, data.table)
        let el = document.getElementById('tableFilter')
        el.outerHTML = createTable(filterTable)
        // console.log(data.elem)
    })

function createTable(filterTable) {
    let addHTML = ''
    for (let itemTable in filterTable) {
        if (filterTable[itemTable].author === undefined) {
            filterTable[itemTable].author = ''
        }
        let item = '<tr class="align-middle">' +
            '<td>' + itemTable + '</td>' +
            '<td class="d-inline-block text-truncate table-test-url">' + filterTable[itemTable].file + '</td>' +
            '<td>' + filterTable[itemTable].title + '</td>' +
            '<td class="table-test-edit"><a type="button" class="btn btn-success btn-sm" href="\edit.php">EDIT</a></td>' +
            '<td>Published</td>' +
            '<td>' + filterTable[itemTable].author + '</td>' +
            '<td>' + filterTable[itemTable].category + '</td>' +
            '<td>' + filterTable[itemTable].tool + '</td>' +
            '<td>' + filterTable[itemTable].views + '</td>' +
            '<td>' + cutMyStrMin(filterTable[itemTable].published_on, ' ') + '</td>' +
            '<td>' + cutMyStrMin(filterTable[itemTable].modified_on, ' ') + '</td>' +
            '<td class="table-test-unpublish">' +
            '<button type="button" class="btn btn-light btn-sm">UNPUBLISH</button>' +
            '</td></tr>'
        addHTML = addHTML + item
    }
    return addHTML
}

function cutMyStrMin(str, char) {
    return str.replace(new RegExp(`(.*?${char}).*`), '$1')
}
