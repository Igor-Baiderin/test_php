var filterTable = [];
var dataTable = [];
var dataAuthor = [];
var dataTool = [];
let url = '../getTable.php';
let response = fetch(url)
    .then(response => response.json())
    .then((data) => {
        Object.assign(dataTable, data.table)
        Object.assign(filterTable, data.table)
        Object.assign(dataAuthor, data.author)
        Object.assign(dataTool, data.tool)
        let el = document.getElementById('tableFilter')
        el.outerHTML = createTable(filterTable)
        setAutorAndTool()
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
            '<td class="table-test-edit"><a type="button" class="btn btn-success btn-sm" href="\edit.html?file=' + filterTable[itemTable].file + '">EDIT</a></td>' +
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

function setAutorAndTool() {
    setAutor()
    setTool()
}

function setAutor() {
    let el = document.getElementById('select-author')
    let addHTML = ''
    for (let itemAuthor of dataAuthor) {
        let item = '<li><a class="dropdown-item" href="#">'+itemAuthor+'</a></li>'
        addHTML = addHTML + item
    }
    el.outerHTML = addHTML;
}

function setTool() {
    let el = document.getElementById('select-tool')
    let addHTML = ''
    for (let itemTool of dataTool) {
        let item = '<li><a class="dropdown-item" href="#">'+itemTool+'</a></li>'
        addHTML = addHTML + item
    }
    el.outerHTML = addHTML;
}


